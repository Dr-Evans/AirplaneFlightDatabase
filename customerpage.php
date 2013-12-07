#!/usr/local/bin/php    
<html>
<head>
    <title>Customer Page</title>
</head>
<body>

<h1>Customer Page</h1>
<h4><a href="index.php">Homepage</a></h4>

<?php
    session_start();
    echo "Welcome, " . $_SESSION['username'] . ".";
?>

<h2>Basic Flight Search</h2>
<form action="" method="post" name="query">
    Date: <input type="text" name="query_date_text"> </br>
    Time: <input type="text" name="query_time_text"> </br>
    City: <input type="text" name="query_city_text"> </br>
    State: <input type="text" name="query_state_text"> </br>
    <input type="submit" value="search" name="query_search_button" />
    <input type="reset" value="clear" name="query_clear_button" />
</form>

<h2>Date Range Flight Search</h2>
<form action="" method="post" name="date">
    Date: <input type="text" name="date_date_text"> </br>
    Departure City: <input type="text" name="date_departure_city_text"> </br>
    Departure State: <input type="text" name="date_departure_state_text"> </br>
    Arrival City: <input type="text" name="date_arrival_city_text"> </br>
    Arrival State: <input type="text" name="date_arrival_state_text"> </br>
    <input type="submit" value="search" name="date_search_button" />
    <input type="reset" value="clear" name="date_clear_button" />
</form>

<h2>Make a Payment</h2>
<form action="" method="post" name="payment">
    Name on Card: <input type="text" name="payment_full_name"> </br>
    Account Number: <input type="text" name="payment_account_number"> </br>
    Trip Number: <input type="text" name="payment_trip_number"> </br>
    <input type="submit" value="search" name="payment_search_button" />
    <input type="reset" value="clear" name="payment_clear_button" />
</form>

<?php
    include 'printquery.php';

    $connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');
    
    if(isset($_POST['query_date_text']) && isset($_POST['query_time_text']) && isset($_POST['query_city_text']) && isset($_POST['query_state_text']) && isset($_POST['query_search_button'])){
        
        $date = $_POST["query_date_text"];
        $time = $_POST["query_time_text"];
	$city = $_POST["query_city_text"];
	$state = $_POST["query_state_text"];
        
        print $date . $time . $city . $state;
    
        $departureCodes = "SELECT code
                               FROM Airport
                               WHERE city = :city AND state = :state";
                              
        $arrivalCodes = "SELECT code
                             FROM Airport
                             WHERE city = :city AND state = :state";
        
        //1
        $tripNums = "SELECT trip#
                     FROM Trip
                     WHERE departure IN ($departureCodes) OR arrival IN ($arrivalCodes)";
        
        //2
        $tripNumsWithGoodDates = "SELECT trip#
                                  FROM FlightLeg
                                  WHERE trip# IN ($tripNums) AND legDate = to_date('$date', 'DD-MON-YY')";
        
        //3                          
        $tripNumsWithGoodDatesAndTimes = "(SELECT trip#
                                          FROM Departure
                                          WHERE trip# IN ($tripNumsWithGoodDates) AND scheduleTime = '$time')
                                          UNION
                                          (SELECT trip#
                                          FROM Arrival
                                          WHERE trip# IN ($tripNumsWithGoodDates) AND scheduleTime = '$time')";
        
        $holdon = "SELECT trip#, departure, arrival
                  FROM Trip
                  WHERE trip# IN ($tripNumsWithGoodDatesAndTimes)";
 
        $departureAirportRename = "SELECT code AS departure, city AS DepartureCity, state AS DepartureState
                                   FROM Airport";
                                   
        $arrivalAirportRename = "SELECT code AS arrival, city AS ArrivalCity, state as ArrivalState
                                   FROM Airport";
                                   
        $final = "SELECT trip#, DepartureCity, DepartureState, ArrivalCity, ArrivalState
                   FROM   ($arrivalAirportRename) NATURAL JOIN (($holdon) NATURAL JOIN ($departureAirportRename))";
                  
        $result = oci_parse($connection, $final);
        
        
        oci_bind_by_name($result, ":city", $city);
        oci_bind_by_name($result, ":state", $state);
        
        oci_execute($result);
        
        printQuery($result);
        
        oci_free_statement($result);
        
    }
    
    if(isset($_POST['date_date_text']) && isset($_POST['date_departure_city_text']) && isset($_POST['date_departure_state_text']) && isset($_POST['date_arrival_city_text']) && isset($_POST['date_arrival_state_text'])){
        $date = $_POST["date_date_text"];
        $departureCity = $_POST["date_departure_city_text"];
	$departureState = $_POST["date_departure_state_text"];
	$arrivalCity = $_POST["date_arrival_city_text"];
	$arrivalState = $_POST["date_arrival_state_text"];
        
        print $date . $departureCity . $departureState . $arrivalCity . $arrivalState;
        
        
        $departureCodeQuery = "SELECT code
                               FROM Airport
                               WHERE city = :departureCity AND state = :departureState";
                               
        $arrivalCodeQuery = "SELECT code
                             FROM Airport
                             WHERE city = :arrivalCity AND state = :arrivalState";
                               
        $tripNumQuery = "SELECT trip#
                         FROM Trip
                         WHERE departure = ($departureCodeQuery) AND arrival = ($arrivalCodeQuery)";
        
        $scheduleTimeQuery = "SELECT trip#, scheduleTime
                              FROM Departure
                              WHERE legNumber = 1 AND trip# = ($tripNumQuery)";
                              
        $dateQuery = "SELECT trip#, legDate
                      FROM FlightLeg
                      WHERE trip# = ($tripNumQuery) AND legNumber = 1 AND legDate >= to_date('$date', 'DD-MON-YY') - 2 AND legDate <= to_date('$date', 'DD-MON-YY') + 2";
                      
        $finalQuery = "SELECT *
                       FROM ($dateQuery) NATURAL JOIN ($scheduleTimeQuery)";
                                      
        $result = oci_parse($connection, $finalQuery);
        
        oci_bind_by_name($result, ":departureCity", $departureCity);
        oci_bind_by_name($result, ":departureState", $departureState);
        oci_bind_by_name($result, ":arrivalCity", $arrivalCity);
        oci_bind_by_name($result, ":arrivalState", $arrivalState);
        
        oci_execute($result);
        
        printQuery($result);
        
        oci_free_statement($result);
        
    }
    
    if(isset($_POST['payment_full_name']) && isset($_POST['payment_account_number']) && isset($_POST['payment_trip_number']) && isset($_POST['payment_search_button'])){
        $name = $_SESSION['username'];
        $fullName = $_POST['payment_full_name'];
        $accNum = $_POST["payment_account_number"];
	$tripNum = $_POST["payment_trip_number"];
        
        $date = to_date('SYSDATE','DD-MON-YY');
                        
        $reservationNumQuery = oci_parse($connection, "SELECT Reservation#
                                                        FROM Reservation
                                                        WHERE username = :name");
                           
        oci_bind_by_name($reservationNumQuery, ":name", $name);
        
        oci_execute($reservationNumQuery);
        oci_free_statement($reservationNumQuery);
        
        $resArray = oci_fetch_array($reservationNumQuery);
        
        $resNum = $resArray[0];
        $transNum = $resNum;
        
        echo $resNum;
        
        $result = oci_parse($connection, "INSERT INTO Payment VALUES (:tripNum, :transNum, '$date', :accNum, :fullName, :resNum)");

        oci_bind_by_name($result, ":tripNum", $tripNum);
        oci_bind_by_name($result, ":transNum", $transNum);
        oci_bind_by_name($result, ":accNum", $accNum);
        oci_bind_by_name($result, ":fullName", $fullName);
        oci_bind_by_name($result, ":resNum", $resNum);
        
        oci_execute($result);
        oci_free_statement($result);
    }
    
    oci_close($connection);
?>