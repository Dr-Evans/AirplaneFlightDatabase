#!/usr/local/bin/php    
<html>
<head>
    <title>Admin Page</title>
</head>
<body style="width:100%;">

<h1>Admin Page</h1>
<h4><a href="index.php">Homepage</a></h4>
<?php
    include 'printtables.php';
    include 'modifytables.php';
    
    session_start();
    echo "Welcome, <b>" . $_SESSION['username'] . "</b>.";
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
            $hit = false;
            $w = false;
            $y = false;
            //Insert Airport
            if(isset($_POST['modify_airport_code']) && isset($_POST['modify_airport_city']) && isset($_POST['modify_airport_state']) && isset($_POST['modify_airport_name']) && isset($_POST['modify_airport_insert_button'])){
                $code = $_POST["modify_airport_code"];
                $city = $_POST["modify_airport_city"];
                $state = $_POST["modify_airport_state"];
                $name = $_POST["modify_airport_name"];
                
                $w = insertAirport($code, $city, $state, $name, $connection);
                $hit = true;
            }
            
            //Delete Airport
            if(isset($_POST['modify_airport_code']) && isset($_POST['modify_airport_city']) && isset($_POST['modify_airport_state']) && isset($_POST['modify_airport_name']) && isset($_POST['modify_airport_delete_button'])){
                $code = $_POST["modify_airport_code"];
                $city = $_POST["modify_airport_city"];
                $state = $_POST["modify_airport_state"];
                $name = $_POST["modify_airport_name"];
                
                $y = deleteAirport($code, $city, $state, $name, $connection);
                $hit = true;
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
                $hit = true;
            }
            
            //Delete Departure
            if(isset($_POST['modify_departure_code']) && isset($_POST['modify_departure_leg_number']) && isset($_POST['modify_departure_trip_number']) && isset($_POST['modify_departure_time']) && isset($_POST['modify_departure_date']) && ($_POST['modify_departure_delete_button'])){                $code = $_POST["modify_departure_code"];
                $legNum = $_POST["modify_departure_leg_number"];
                $tripNum = $_POST["modify_departure_trip_number"];
                $time = $_POST["modify_departure_time"];
                $date = $_POST["modify_departure_date"];
                
                $y = deleteDeparture($code, $legNum, $tripNum, $time, $date, $connection);
                $hit = true;
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
                $hit = true;
            }
            
            //Delete Arrival
            if(isset($_POST['modify_arrival_code']) && isset($_POST['modify_arrival_leg_number']) && isset($_POST['modify_arrival_trip_number']) && isset($_POST['modify_arrival_time']) && isset($_POST['modify_arrival_date']) && ($_POST['modify_arrival_delete_button'])){
               $code = $_POST["modify_arrival_code"];
                $legNum = $_POST["modify_arrival_leg_number"];
                $tripNum = $_POST["modify_arrival_trip_number"];
                $time = $_POST["modify_arrival_time"];
                $date = $_POST["modify_arrival_date"];
                
                $y = deleteArrival($code, $legNum, $tripNum, $time, $date, $connection);
                $hit = true;
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
                $hit = true;
            }
            
            //Delete Flight Leg
            if(isset($_POST['modify_flight_leg_leg_number']) && isset($_POST['modify_flight_leg_trip_number']) && isset($_POST['modify_flight_leg_available_seats']) && isset($_POST['modify_flight_leg_date']) && ($_POST['modify_flight_leg_delete_button'])){
                $legNum = $_POST["modify_flight_leg_leg_number"];
                $tripNum = $_POST["modify_flight_leg_trip_number"];
                $seats = $_POST["modify_flight_leg_available_seats"];
                $date = $_POST["modify_flight_leg_date"];
                
                $y = deleteFlightLeg($legNum, $tripNum, $seats, $date, $connection);
                $hit = true;
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
                $hit = true;
            }
            
            //Delete Trip
            if(isset($_POST['modify_trip_trip_number']) && isset($_POST['modify_trip_airline']) && isset($_POST['modify_trip_price']) && isset($_POST['modify_trip_departure_code']) && ($_POST['modify_trip_arrival_code']) && ($_POST['modify_trip_legs']) && ($_POST['modify_trip_delete_button'])){

                $tripNum = $_POST["modify_trip_trip_number"];
                $airline = $_POST["modify_trip_airline"];
                $price = $_POST["modify_trip_price"];
                $departureCode = $_POST["modify_trip_departure_code"];
                $arrivalCode = $_POST["modify_trip_arrival_code"];
                $legs = $_POST["modify_trip_legs"];
                
                $y = deleteTrip($tripNum, $airline, $price, $departureCode, $arrivalCode, $legs, $connection);
                $hit = true;
            }
        ?>
        
        
        <h2>Modify Assign</h2>
        <form action="" method="post" name="modify_assign">
            Plane ID: <input type="text" name="modify_assign_plane_ID"> </br>
            Leg Number: <input type="text" name="modify_assign_leg_number"> </br>
            Trip Number: <input type="text" name="modify_assign_trip_number"> </br>
            <input type="submit" value="insert" name="modify_assign_insert_button" />
            <input type="submit" value="delete" name="modify_assign_delete_button" />
            <input type="reset" value="clear" name="modify_assign_clear" />
        </form>
        
        <?php
            //Insert Assign
            if(isset($_POST['modify_assign_plane_ID']) && isset($_POST['modify_assign_leg_number']) && isset($_POST['modify_assign_trip_number']) && isset($_POST['modify_assign_insert_button'])){

                $planeID = $_POST["modify_assign_plane_ID"];
                $legNum = $_POST["modify_assign_leg_number"];
                $tripNum = $_POST["modify_assign_trip_number"];
                
                $w = insertAssign($planeID, $legNum, $tripNum, $connection);
                $hit = true;
            }
            
            //Delete Assign
            if(isset($_POST['modify_assign_plane_ID']) && isset($_POST['modify_assign_leg_number']) && isset($_POST['modify_assign_trip_number']) && isset($_POST['modify_assign_delete_button'])){

                $planeID = $_POST["modify_assign_plane_ID"];
                $legNum = $_POST["modify_assign_leg_number"];
                $tripNum = $_POST["modify_assign_trip_number"];
                
                $y = deleteAssign($planeID, $legNum, $tripNum, $connection);
                $hit = true;
            }
        ?>
        
        <h2>Modify Airplane</h2>
        <form action="" method="post" name="modify_airplane">
            Plane ID: <input type="text" name="modify_airplane_plane_ID"> </br>
            Type: <input type="text" name="modify_airplane_type"> </br>
            Seats: <input type="text" name="modify_airplane_seats"> </br>
            <input type="submit" value="insert" name="modify_airplane_insert_button" />
            <input type="submit" value="delete" name="modify_airplane_delete_button" />
            <input type="reset" value="clear" name="modify_airplane_clear" />
        </form>
        
        <?php
        
            //Insert Airplane
            if(isset($_POST['modify_airplane_plane_ID']) && isset($_POST['modify_airplane_type']) && isset($_POST['modify_airplane_seats']) && isset($_POST['modify_airplane_insert_button'])){

                $planeID = $_POST["modify_airplane_plane_ID"];
                $type = $_POST["modify_airplane_type"];
                $seats = $_POST["modify_airplane_seats"];
                
                $w = insertAirplane($planeID, $type, $seats, $connection);
                $hit = true;
            }
            
            //Delete Airplane
            if(isset($_POST['modify_airplane_plane_ID']) && isset($_POST['modify_airplane_type']) && isset($_POST['modify_airplane_seats']) && isset($_POST['modify_airplane_delete_button'])){

                $planeID = $_POST["modify_airplane_plane_ID"];
                $type = $_POST["modify_airplane_type"];
                $seats = $_POST["modify_airplane_seats"];
                
                $y = deleteAirplane($planeID, $type, $seats, $connection);
                $hit = true;
            }
        ?>
        
        <h2>Modify Payment</h2>
        <form action="" method="post" name="modify_payment">
            Trip Number: <input type="text" name="modify_payment_trip_number"> </br>
            Reservation Number: <input type="text" name="modify_payment_reservation_number"> </br>
            Transaction Number: <input type="text" name="modify_payment_transaction_number"> </br>
            Name on Account: <input type="text" name="modify_payment_name"> </br>
            Account Number: <input type="text" name="modify_payment_account_number"> </br>
            Payment Date: <input type="text" name="modify_payment_date"> </br>
            <input type="submit" value="insert" name="modify_payment_insert_button" />
            <input type="submit" value="delete" name="modify_payment_delete_button" />
            <input type="reset" value="clear" name="modify_payment_clear" />
        </form>
        
        <?php
            
            //Insert Payment
            if(isset($_POST['modify_payment_trip_number']) && isset($_POST['modify_payment_reservation_number']) && isset($_POST['modify_payment_transaction_number']) && isset($_POST['modify_payment_name']) && isset($_POST['modify_payment_account_number']) && isset($_POST['modify_payment_date']) && isset($_POST['modify_payment_insert_button'])){

                $tripNum = $_POST["modify_payment_trip_number"];
                $resNum = $_POST["modify_payment_reservation_number"];
                $transNum = $_POST["modify_payment_transaction_number"];
                $name = $_POST["modify_payment_name"];
                $accNum = $_POST["modify_payment_account_number"];
                $date = $_POST["modify_payment_date"];
                
                $w = insertPayment($tripNum, $resNum, $transNum, $name, $accNum, $date, $connection);
                $hit = true;
            }
            
            //Delete Payemnt
            if(isset($_POST['modify_payment_trip_number']) && isset($_POST['modify_payment_reservation_number']) && isset($_POST['modify_payment_transaction_number']) && isset($_POST['modify_payment_name']) && isset($_POST['modify_payment_account_number']) && isset($_POST['modify_payment_date']) && isset($_POST['modify_payment_delete_button'])){

                $tripNum = $_POST["modify_payment_trip_number"];
                $resNum = $_POST["modify_payment_reservation_number"];
                $transNum = $_POST["modify_payment_transaction_number"];
                $name = $_POST["modify_payment_name"];
                $accNum = $_POST["modify_payment_account_number"];
                $date = $_POST["modify_payment_date"];
                
                $y = deletePayment($tripNum, $resNum, $transNum, $name, $accNum, $date, $connection);
                $hit = true;
            }
        ?>
        
        <h2>Modify Reservation</h2>
        <form action="" method="post" name="modify_reservation">
            Reservation Number: <input type="text" name="modify_reservation_reservation_number"> </br>
            Email: <input type="text" name="modify_reservation_email"> </br>
            Name: <input type="text" name="modify_reservation_name"> </br>
            Address: <input type="text" name="modify_reservation_address"> </br>
            Phone Number: <input type="text" name="modify_reservation_phone_number"> </br>
            Reservation Date: <input type="text" name="modify_reservation_reservation_date"> </br>
            Username: <input type="text" name="modify_reservation_username"> </br>
            <input type="submit" value="insert" name="modify_reservation_insert_button" />
            <input type="submit" value="delete" name="modify_reservation_delete_button" />
            <input type="reset" value="clear" name="modify_reservation_clear" />
        </form>
        
        <?php
            
            //Insert Reservation
            if(isset($_POST['modify_reservation_reservation_number']) && isset($_POST['modify_reservation_email']) && isset($_POST['modify_reservation_name']) && isset($_POST['modify_reservation_address']) && isset($_POST['modify_reservation_phone_number']) && isset($_POST['modify_reservation_reservation_date']) && isset($_POST['modify_reservation_username']) && isset($_POST['modify_reservation_insert_button'])){

                $resNum = $_POST["modify_reservation_reservation_number"];
                $email = $_POST["modify_reservation_email"];
                $name = $_POST["modify_reservation_name"];
                $address = $_POST["modify_reservation_address"];
                $phoneNum = $_POST["modify_reservation_phone_number"];
                $resDate = $_POST["modify_reservation_reservation_date"];
                $customerUsername = $_POST["modify_reservation_username"];
                
                $w = insertReservation($resNum, $email, $name, $address, $phoneNum, $resDate, $customerUsername, $connection);
                $hit = true;
            }
            
            //Delete Reservation
            if(isset($_POST['modify_reservation_reservation_number']) && isset($_POST['modify_reservation_email']) && isset($_POST['modify_reservation_name']) && isset($_POST['modify_reservation_address']) && isset($_POST['modify_reservation_phone_number']) && isset($_POST['modify_reservation_reservation_date']) && isset($_POST['modify_reservation_username']) && isset($_POST['modify_reservation_delete_button'])){

                $resNum = $_POST["modify_reservation_reservation_number"];
                $email = $_POST["modify_reservation_email"];
                $name = $_POST["modify_reservation_name"];
                $address = $_POST["modify_reservation_address"];
                $phoneNum = $_POST["modify_reservation_phone_number"];
                $resDate = $_POST["modify_reservation_reservation_date"];
                $customerUsername = $_POST["modify_reservation_username"];
                
                $y = deleteReservation($resNum, $email, $name, $address, $phoneNum, $resDate, $customerUsername, $connection);
                $hit = true;
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
<div style="clear:both">
    <?php
    if($hit){
        if ($w && !($y)){
            echo "<b>Insertion successful.</b><br>";
        }
        
        if (!($w) && $y){
            echo "<b>Deletion successful.</b><br>";
        }
    }
    ?>
</div>
</body>


<?php
    oci_close($connection);
?>
