<?php
    function insertAirplane($code, $city, $state, $name, $connection){
        $airportInsert = oci_parse($connection, "INSERT INTO Airport VALUES(:code, :city, :state, :name)");
    
        oci_bind_by_name($airportInsert, ":code", $code);
        oci_bind_by_name($airportInsert, ":city", $city);
        oci_bind_by_name($airportInsert, ":state", $state);
        oci_bind_by_name($airportInsert, ":name", $name);
        
        $worked = oci_execute($airportInsert);
        
        oci_free_statement($airportInsert);
        
        return $worked;
    }
    
    function deleteAirplane($code, $city, $state, $name, $connection){
        $airportInsert = oci_parse($connection, "DELETE FROM Airport WHERE code = :code AND city = :city AND state = :state AND name = :name");
    
        oci_bind_by_name($airportInsert, ":code", $code);
        oci_bind_by_name($airportInsert, ":city", $city);
        oci_bind_by_name($airportInsert, ":state", $state);
        oci_bind_by_name($airportInsert, ":name", $name);
        
        $worked = oci_execute($airportInsert);
        
        oci_free_statement($airportInsert);
        
        return $worked;
    }
    
    function insertDeparture($code, $legNum, $tripNum, $time, $date, $connection){
        $departureInsert = oci_parse($connection, "INSERT INTO Departure VALUES(:code, :legNum, :tripNum, '$time', '$date')");
    
        oci_bind_by_name($departureInsert, ":code", $code);
        oci_bind_by_name($departureInsert, ":legNum", $legNum);
        oci_bind_by_name($departureInsert, ":tripNum", $tripNum);
        
        $worked = oci_execute($departureInsert);
        
        oci_free_statement($departureInsert);
        
        return $worked;
    }
    
    function deleteDeparture($code, $legNum, $tripNum, $time, $date, $connection){
        $departureDelete = oci_parse($connection, "DELETE FROM Departure WHERE code = :code AND legNumber = :legNum AND trip# = :tripNum AND SCHEDULETIME = '$time' AND departdate = '$date'");
    
        oci_bind_by_name($departureDelete, ":code", $code);
        oci_bind_by_name($departureDelete, ":legNum", $legNum);
        oci_bind_by_name($departureDelete, ":tripNum", $tripNum);
        
        $worked = oci_execute($departureDelete);
        
        oci_free_statement($departureDelete);
        
        return $worked;
    }
    
    function insertArrival($code, $legNum, $tripNum, $time, $date, $connection){
        $arrivalInsert = oci_parse($connection, "INSERT INTO Departure VALUES(:code, :legNum, :tripNum, '$time', '$date')");
    
        oci_bind_by_name($arrivalInsert, ":code", $code);
        oci_bind_by_name($arrivalInsert, ":legNum", $legNum);
        oci_bind_by_name($arrivalInsert, ":tripNum", $tripNum);
        
        $worked = oci_execute($arrivalInsert);
        
        oci_free_statement($arrivalInsert);
        
        return $worked;
    }
    
    function deleteArrival($code, $legNum, $tripNum, $time, $date, $connection){
        $arrivalDelete = oci_parse($connection, "DELETE FROM Departure WHERE code = :code AND legNumber = :legNum AND trip# = :tripNum AND SCHEDULETIME = '$time' AND arrivaldate = '$date'");
    
        oci_bind_by_name($arrivalDelete, ":code", $code);
        oci_bind_by_name($arrivalDelete, ":legNum", $legNum);
        oci_bind_by_name($arrivalDelete, ":tripNum", $tripNum);
        
        $worked = oci_execute($arrivalDelete);
        
        oci_free_statement($arrivalDelete);

        return $worked;
    }
    
    function insertFlightLeg($legNum, $tripNum, $seats, $date, $connection){
        $flightLegInsert = oci_parse($connection, "INSERT INTO FlightLeg VALUES(:legNum, :tripNum, :seats, '$date')");
    
        oci_bind_by_name($flightLegInsert, ":legNum", $legNum);
        oci_bind_by_name($flightLegInsert, ":tripNum", $tripNum);       
        oci_bind_by_name($flightLegInsert, ":seats", $seats);
        
        $worked = oci_execute($flightLegInsert);
        
        oci_free_statement($flightLegInsert);
        
        return $worked;
    }

    function deleteFlightLeg($legNum, $tripNum, $seats, $date, $connection){
        $flightLegDelete = oci_parse($connection, "DELETE FROM FlightLeg WHERE legNumber = :legNum AND trip# = :tripNum AND numSeatsAvailable = :seats AND legDate = '$date'");
    
        oci_bind_by_name($flightLegDelete, ":legNum", $legNum);
        oci_bind_by_name($flightLegDelete, ":tripNum", $tripNum);       
        oci_bind_by_name($flightLegDelete, ":seats", $seats);
        
        $worked = oci_execute($flightLegDelete);
        
        oci_free_statement($flightLegDelete);
        
        return $worked;
    }
    
    function insertTrip($tripNum, $airline, $price, $departureCode, $arrivalCode, $legs, $connection){
        $tripInsert = oci_parse($connection, "INSERT INTO FlightLeg VALUES(:tripNum, :airline, :price, :departureCode, :arrivalCode, :legs)");
    
        oci_bind_by_name($tripInsert, ":tripNum", $tripNum);
        oci_bind_by_name($tripInsert, ":airline", $airline);
        oci_bind_by_name($tripInsert, ":price", $price);
        oci_bind_by_name($tripInsert, ":departureCode", $departureCode);
        oci_bind_by_name($tripInsert, ":arrivalCode", $arrivalCode);
        oci_bind_by_name($tripInsert, ":legs", $legs);
        
        $worked = oci_execute($tripInsert);
        
        oci_free_statement($tripInsert);
        
        return $worked;
    }
    
    function deleteTrip($tripNum, $airline, $price, $departureCode, $arrivalCode, $legs, $connection){
        $tripDelete = oci_parse($connection, "DELETE FROM Trip WHERE trip# = :tripNum AND airline = :airline AND price = :price AND departure = :departureCode AND arrival = :arrivalCode AND numOfLegs = :legs");
    
        oci_bind_by_name($tripDelete, ":tripNum", $tripNum);
        oci_bind_by_name($tripDelete, ":airline", $airline);
        oci_bind_by_name($tripDelete, ":price", $price);
        oci_bind_by_name($tripDelete, ":departureCode", $departureCode);
        oci_bind_by_name($tripDelete, ":arrivalCode", $arrivalCode);
        oci_bind_by_name($tripDelete, ":legs", $legs);
        
        $worked = oci_execute($tripDelete);
        
        oci_free_statement($tripDelete);
        
        return $worked;
    }
?>