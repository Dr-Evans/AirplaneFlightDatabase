<?php
    include 'printquery.php';
    function printAirportInfo($connection){
        echo "<h1>Airport Info<h1>";
        //Airport
        echo "<h2>Airport<h2>";
        $airport = oci_parse($connection, "SELECT * FROM Airport");
        oci_execute($airport);
        printQuery($airport);
        oci_free_statement($airport);
        
        //Departure
        echo "<h2>Departure<h2>";
        $departure = oci_parse($connection, "SELECT * FROM Departure");
        oci_execute($departure);
        printQuery($departure);
        oci_free_statement($departure);
        
        //Arrival
        echo "<h2>Arrival<h2>";
        $arrival = oci_parse($connection, "SELECT * FROM Arrival");
        oci_execute($arrival);
        printQuery($arrival);
        oci_free_statement($arrival);
    }
    
    function printFlightInfo($connection){
        echo "<h1>Flight Info<h1>";
        //FlightLeg
        echo "<h2>Flight Leg<h2>";
        $flightleg = oci_parse($connection, "SELECT * FROM FlightLeg");
        oci_execute($flightleg);
        printQuery($flightleg);
        oci_free_statement($flightleg);
        
        //Trip
        echo "<h2>Trip<h2>";
        $trip = oci_parse($connection, "SELECT * FROM Trip");
        oci_execute($trip);
        printQuery($trip);
        oci_free_statement($trip);
    }
    
    function printPaymentInfo($connection){
        echo "<h1>Payment Info<h1>";
        //Payment
        echo "<h2>Payment<h2>";
        $payment = oci_parse($connection, "SELECT * FROM Payment");
        oci_execute($payment);
        printQuery($payment);
        oci_free_statement($payment);
        
        //Reservation
        echo "<h2>Reservation<h2>";
        $reservation = oci_parse($connection, "SELECT * FROM Reservation");
        oci_execute($reservation);
        printQuery($reservation);
        oci_free_statement($reservation);
    }
    
    function printAirplaneInfo($connection){
        echo "<h1>Airplane Info<h1>";
        //Assign
        echo "<h2>Assign<h2>";
        $assign = oci_parse($connection, "SELECT * FROM Assign");
        oci_execute($assign);
        printQuery($assign);
        oci_free_statement($assign);
        
        //Airplane
        echo "<h2>Airplane<h2>";
        $airplane = oci_parse($connection, "SELECT * FROM Airplane");
        oci_execute($airplane);
        printQuery($airplane);
        oci_free_statement($airplane);
    }
    
    function printUsernameInfo($connection){
        echo "<h1>Username Info<h1>";
        //Customer
        echo "<h2>Customer<h2>";
        $customer = oci_parse($connection, "SELECT * FROM Customer");
        oci_execute($customer);
        printQuery($customer);
        oci_free_statement($customer);
    }
?>