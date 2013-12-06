#!/usr/local/bin/php    
<html>
<head>
    <title>Admin Page</title>
</head>
<body style="width:100%;">

<h1>Admin Page</h1>

<?php
    include 'printtables.php';
    include 'modifytables.php';
    
    session_start();
    echo "Welcome, " . $_SESSION['username'] . ".";
    $connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');
             
?>

<div style="width: 100%;">
   <div style="border:1px solid black;width:15%;height: 80%;overflow:scroll;overflow-y:scroll;overflow-x:hidden;float:left;">
        <h2>Modify Airport</h2>
        <form action="" method="post" name="modify_airport">
            Code: <input type="text" name="modify_airport_code"> </br>
            City: <input type="text" name="modify_airport_city"> </br>
            State: <input type="text" name="modify_airport_state"> </br>
            Name: <input type="text" name="modify_airport_name"> </br>
            <input type="submit" value="insert" name="modify_airport_insert_button" />
            <input type="submit" value="delete" name="modify_airport_delete_button" />
            <input type="reset" value="clear" name="modify_airport_clear" />
        </form>
        
        <?php
            //Insert Airport
            if(isset($_POST['modify_airport_code']) && isset($_POST['modify_airport_city']) && isset($_POST['modify_airport_state']) && isset($_POST['modify_airport_name']) && isset($_POST['modify_airport_insert_button'])){
                $code = $_POST["modify_airport_code"];
                $city = $_POST["modify_airport_city"];
                $state = $_POST["modify_airport_state"];
                $name = $_POST["modify_airport_name"];
                
                $w = insertAirplane($code, $city, $state, $name, $connection);
                
                if ($w){
                    echo "<b>Insertion successful.</b><br>";
                }
                else{
                    echo "<b>Insertion unsuccessful.</b><br>";
                }
            }
            
            //Delete Airport
            if(isset($_POST['modify_airport_code']) && isset($_POST['modify_airport_city']) && isset($_POST['modify_airport_state']) && isset($_POST['modify_airport_name']) && isset($_POST['modify_airport_delete_button'])){
                $code = $_POST["modify_airport_code"];
                $city = $_POST["modify_airport_city"];
                $state = $_POST["modify_airport_state"];
                $name = $_POST["modify_airport_name"];
                
                $w = deleteAirplane($code, $city, $state, $name, $connection);
                
                if ($w){
                    echo "<b>Deletion successful.</b><br>";
                }
                else{
                    echo "<b>Deletion unsuccessful.</b><br>";
                }
            }
        ?>
        
        
        <h2>Modify Departure</h2>
        <form action="" method="post" name="modify_departure">
            Code: <input type="text" name="modify_departure_code"> </br>
            Leg Number: <input type="text" name="modify_departure_leg_number"> </br>
            Trip Number: <input type="text" name="modify_departure_trip_number"> </br>
            Time: <input type="text" name="modify_departure_time"> </br>
            Date: <input type="text" name="modify_departure_date"> </br>
            <input type="submit" value="insert" name="modify_departure_insert_button" />
            <input type="submit" value="delete" name="modify_departure_delete_button" />
            <input type="reset" value="clear" name="modify_departure_clear" />
        </form>
        
        <?php
            //Insert Departure
            if(isset($_POST['modify_departure_code']) && isset($_POST['modify_departure_leg_number']) && isset($_POST['modify_departure_trip_number']) && isset($_POST['modify_departure_time']) && isset($_POST['modify_departure_date']) && ($_POST['modify_departure_insert_button'])){
                $code = $_POST["modify_departure_code"];
                $legNum = $_POST["modify_departure_leg_number"];
                $tripNum = $_POST["modify_departure_trip_number"];
                $time = $_POST["modify_departure_time"];
                $date = $_POST["modify_departure_date"];
                
                $w = insertDeparture($code, $legNum, $tripNum, $time, $date, $connection);
                
                if ($w){
                    echo "<b>Insertion successful.</b><br>";
                }
                else{
                    echo "<b>Insertion unsuccessful.</b><br>";
                }
            }
            
            //Delete Departure
            if(isset($_POST['modify_departure_code']) && isset($_POST['modify_departure_leg_number']) && isset($_POST['modify_departure_trip_number']) && isset($_POST['modify_departure_time']) && isset($_POST['modify_departure_date']) && ($_POST['modify_departure_delete_button'])){                $code = $_POST["modify_departure_code"];
                $legNum = $_POST["modify_departure_leg_number"];
                $tripNum = $_POST["modify_departure_trip_number"];
                $time = $_POST["modify_departure_time"];
                $date = $_POST["modify_departure_date"];
                
                $w = deleteDeparture($code, $legNum, $tripNum, $time, $date, $connection);
                
                if ($w){
                    echo "<b>Deletion successful.</b><br>";
                }
                else{
                    echo "<b>Deletion unsuccessful.</b><br>";
                }
            }
        ?>
        
        <h2>Modify Arrival</h2>
        <form action="" method="post" name="modify_arrival">
            Code: <input type="text" name="modify_arrival_code"> </br>
            Leg Number: <input type="text" name="modify_arrival_leg_number"> </br>
            Trip Number: <input type="text" name="modify_arrival_trip_number"> </br>
            Time: <input type="text" name="modify_arrival_time"> </br>
            Date: <input type="text" name="modify_arrival_date"> </br>
            <input type="submit" value="insert" name="modify_arrival_insert_button" />
            <input type="submit" value="delete" name="modify_arrival_delete_button" />
            <input type="reset" value="clear" name="modify_arrival_clear" />
        </form>
        
        <?php
            //Insert Arrival
            if(isset($_POST['modify_arrival_code']) && isset($_POST['modify_arrival_leg_number']) && isset($_POST['modify_arrival_trip_number']) && isset($_POST['modify_arrival_time']) && isset($_POST['modify_arrival_date']) && ($_POST['modify_arrival_insert_button'])){
                $code = $_POST["modify_arrival_code"];
                $legNum = $_POST["modify_arrival_leg_number"];
                $tripNum = $_POST["modify_arrival_trip_number"];
                $time = $_POST["modify_arrival_time"];
                $date = $_POST["modify_arrival_date"];
                
                $w = insertArrival($code, $legNum, $tripNum, $time, $date, $connection);
                
                if ($w){
                    echo "<b>Insertion successful.</b><br>";
                }
                else{
                    echo "<b>Insertion unsuccessful.</b><br>";
                }
            }
            
            //Delete Airport
            if(isset($_POST['modify_arrival_code']) && isset($_POST['modify_arrival_leg_number']) && isset($_POST['modify_arrival_trip_number']) && isset($_POST['modify_arrival_time']) && isset($_POST['modify_arrival_date']) && ($_POST['modify_arrival_delete_button'])){
                $code = $_POST["modify_arrival_code"];
                $legNum = $_POST["modify_arrival_leg_number"];
                $tripNum = $_POST["modify_arrival_trip_number"];
                $time = $_POST["modify_arrival_time"];
                $date = $_POST["modify_arrival_date"];
                
                $w = insertArrival($code, $legNum, $tripNum, $time, $date, $connection);
                
                if ($w){
                    echo "<b>Deletion successful.</b><br>";
                }
                else{
                    echo "<b>Deletion unsuccessful.</b><br>";
                }
            }
        ?>
        
        <h2>Modify Flight Leg</h2>
        <form action="" method="post" name="modify_flight_leg">
            Leg Number: <input type="text" name="modify_flight_leg_leg_number"> </br>
            Trip Number: <input type="text" name="modify_flight_leg_trip_number"> </br>
            Available Seats: <input type="text" name="modify_flight_leg_available_seats"> </br>
            Date: <input type="text" name="modify_flight_leg_date"> </br>
            <input type="submit" value="insert" name="modify_flight_leg_insert_button" />
            <input type="submit" value="delete" name="modify_flight_leg_delete_button" />
            <input type="reset" value="clear" name="modify_flight_leg_clear" />
        </form>
        
        <?php
            //Insert Flight Leg
            if(isset($_POST['modify_flight_leg_leg_number']) && isset($_POST['modify_flight_leg_trip_number']) && isset($_POST['modify_flight_leg_available_seats']) && isset($_POST['modify_flight_leg_date']) && ($_POST['modify_flight_leg_insert_button'])){
                $legNum = $_POST["modify_flight_leg_leg_number"];
                $tripNum = $_POST["modify_flight_leg_trip_number"];
                $seats = $_POST["modify_flight_leg_available_seats"];
                $date = $_POST["modify_flight_leg_date"];
                
                $w = insertFlightLeg($legNum, $tripNum, $seats, $date, $connection);
                
                if ($w){
                    echo "<b>Insertion successful.</b><br>";
                }
                else{
                    echo "<b>Insertion unsuccessful.</b><br>";
                }
            }
            
            //Delete Flight Leg
            if(isset($_POST['modify_flight_leg_leg_number']) && isset($_POST['modify_flight_leg_trip_number']) && isset($_POST['modify_flight_leg_available_seats']) && isset($_POST['modify_flight_leg_date']) && ($_POST['modify_flight_leg_delete_button'])){
                $legNum = $_POST["modify_flight_leg_leg_number"];
                $tripNum = $_POST["modify_flight_leg_trip_number"];
                $seats = $_POST["modify_flight_leg_available_seats"];
                $date = $_POST["modify_flight_leg_date"];
                
                $w = deleteFlightLeg($legNum, $tripNum, $seats, $date, $connection);
                
                if ($w){
                    echo "<b>Deletion successful.</b><br>";
                }
                else{
                    echo "<b>Deletion unsuccessful.</b><br>";
                }
            }
        ?>
        
        <h2>Modify Trip</h2>
        <form action="" method="post" name="modify_trip">
            Trip Number: <input type="text" name="modify_trip_trip_number"> </br>
            Airline: <input type="text" name="modify_trip_airline"> </br>
            Price: <input type="text" name="modify_trip_price"> </br>
            Departure Code: <input type="text" name="modify_trip_departure_code"> </br>
            Arrival Code: <input type="text" name="modify_trip_arrival_code"> </br>
            Number Of Legs: <input type="text" name="modify_trip_legs"> </br>
            <input type="submit" value="insert" name="modify_trip_insert_button" />
            <input type="submit" value="delete" name="modify_trip_delete_button" />
            <input type="reset" value="clear" name="modify_trip_clear" />
        </form>
        
        <?php
            //Insert Trip
            if(isset($_POST['modify_trip_trip_number']) && isset($_POST['modify_trip_airline']) && isset($_POST['modify_trip_price']) && isset($_POST['modify_trip_departure_code']) && ($_POST['modify_trip_arrival_code']) && ($_POST['modify_trip_legs']) && ($_POST['modify_trip_insert_button'])){

                $tripNum = $_POST["modify_trip_trip_number"];
                $airline = $_POST["modify_trip_airline"];
                $price = $_POST["modify_trip_price"];
                $departureCode = $_POST["modify_trip_departure_code"];
                $arrivalCode = $_POST["modify_trip_arrival_code"];
                $legs = $_POST["modify_trip_legs"];
                
                $w = insertTrip($tripNum, $airline, $price, $departureCode, $arrivalCode, $legs, $connection);
                
                if ($w){
                    echo "<b>Insertion successful.</b><br>";
                }
                else{
                    echo "<b>Insertion unsuccessful.</b><br>";
                }
            }
            
            //Delete Trip
            if(isset($_POST['modify_trip_trip_number']) && isset($_POST['modify_trip_airline']) && isset($_POST['modify_trip_price']) && isset($_POST['modify_trip_departure_code']) && ($_POST['modify_trip_arrival_code']) && ($_POST['modify_trip_legs']) && ($_POST['modify_trip_delete_button'])){

                $tripNum = $_POST["modify_trip_trip_number"];
                $airline = $_POST["modify_trip_airline"];
                $price = $_POST["modify_trip_price"];
                $departureCode = $_POST["modify_trip_departure_code"];
                $arrivalCode = $_POST["modify_trip_arrival_code"];
                $legs = $_POST["modify_trip_legs"];
                
                $w = deleteTrip($tripNum, $airline, $price, $departureCode, $arrivalCode, $legs, $connection);
                
                if ($w){
                    echo "<b>Deletion successful.</b><br>";
                }
                else{
                    echo "<b>Deletion unsuccessful.</b><br>";
                }
            }
        ?>
        
        
        <h2>Modify Assign</h2>
        <form action="" method="post" name="modify_assign">
            Trip Number: <input type="text" name="modify_assign_assign_number"> </br>
            Airline: <input type="text" name="modify_assign_airline"> </br>
            Price: <input type="text" name="modify_assign_price"> </br>
            Departure Code: <input type="text" name="modify_assign_departure_code"> </br>
            Arrival Code: <input type="text" name="modify_assign_arrival_code"> </br>
            Number Of Legs: <input type="text" name="modify_assign_legs"> </br>
            <input type="submit" value="insert" name="modify_assign_insert_button" />
            <input type="submit" value="delete" name="modify_assign_delete_button" />
            <input type="reset" value="clear" name="modify_assign_clear" />
        </form>
        
        <?php
            //Insert Trip
            if(isset($_POST['modify_assign_assign_number']) && isset($_POST['modify_assign_airline']) && isset($_POST['modify_assign_price']) && isset($_POST['modify_assign_departure_code']) && ($_POST['modify_assign_arrival_code']) && ($_POST['modify_assign_legs']) && ($_POST['modify_assign_insert_button'])){

                $assignNum = $_POST["modify_assign_assign_number"];
                $airline = $_POST["modify_assign_airline"];
                $price = $_POST["modify_assign_price"];
                $departureCode = $_POST["modify_assign_departure_code"];
                $arrivalCode = $_POST["modify_assign_arrival_code"];
                $legs = $_POST["modify_assign_legs"];
                
                $w = insertTrip($assignNum, $airline, $price, $departureCode, $arrivalCode, $legs, $connection);
                
                if ($w){
                    echo "<b>Insertion successful.</b><br>";
                }
                else{
                    echo "<b>Insertion unsuccessful.</b><br>";
                }
            }
            
            //Delete Trip
            if(isset($_POST['modify_assign_assign_number']) && isset($_POST['modify_assign_airline']) && isset($_POST['modify_assign_price']) && isset($_POST['modify_assign_departure_code']) && ($_POST['modify_assign_arrival_code']) && ($_POST['modify_assign_legs']) && ($_POST['modify_assign_delete_button'])){

                $assignNum = $_POST["modify_assign_assign_number"];
                $airline = $_POST["modify_assign_airline"];
                $price = $_POST["modify_assign_price"];
                $departureCode = $_POST["modify_assign_departure_code"];
                $arrivalCode = $_POST["modify_assign_arrival_code"];
                $legs = $_POST["modify_assign_legs"];
                
                $w = deleteTrip($assignNum, $airline, $price, $departureCode, $arrivalCode, $legs, $connection);
                
                if ($w){
                    echo "<b>Deletion successful.</b><br>";
                }
                else{
                    echo "<b>Deletion unsuccessful.</b><br>";
                }
            }
        ?>
        
   </div>
   <div style="border:1px solid black;width: 80%;height: 80%;overflow:scroll;overflow-y:scroll;overflow-x:hidden;float:left;">
        <div style="float:left; width: 2%;"></div>
        <div style="float:left; width: auto;">
             <?php
                 printAirportInfo($connection);
             
             ?>
        </div>
        <div style="float:left; width: 2%;"></div>
           <div style="float:left; width: auto;">
             <?php
                 printFlightInfo($connection);
             ?>
        </div>
           <div style="float:left; width: 2%;"></div>
         <div style="float:left; width: auto;">
             <?php
                 printAirplaneInfo($connection);
             ?>
        </div>
         <div style="float:left; width: 2%;"></div>
         <div style="float:left; width: auto;">
             <?php
                 printPaymentInfo($connection);
             ?>
        </div>
         <div style="float:left; width: 2%;"></div>
         <div style="float:left; width: auto;">
             <?php
                 printUsernameInfo($connection);
             ?>
        </div>
   </div>
</div>
<div style="clear:both"></div>
</body>


<?php
    oci_close($connection);
?>
