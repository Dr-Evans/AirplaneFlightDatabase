<?php
//Register user into Customer table
function register($username, $password, $name, $address, $email, $phone, $connection){
	//Insert username and password into Customer
        $customerInsert = oci_parse($connection, "INSERT INTO Customer VALUES(:username, :password)");

	oci_bind_by_name($customerInsert, ":username", $username);
	oci_bind_by_name($customerInsert, ":password", $password);
	
	oci_execute($customerInsert);
	
	print "$username added to Customer table.<br>";
        
        date_default_timezone_set('EST');
        
        //Insert infromation into reservation
        $reservationInsert = oci_parse($connection, "INSERT INTO Reservation VALUES(:reservationNum, :email, :name, :address, :phone, :reserveDate, :username)");
        
        oci_bind_by_name($reservationInsert, ":email", $email);
        oci_bind_by_name($reservationInsert, ":name", $name);
	oci_bind_by_name($reservationInsert, ":address", $address);
        oci_bind_by_name($reservationInsert, ":phone", $phone);
        oci_bind_by_name($reservationInsert, ":username", $username);
        
        $maxReservationNum = oci_parse($connection, "SELECT MAX(reservation#) FROM Reservation");
        oci_execute($maxReservationNum);
        $row = oci_fetch_array($maxReservationNum);
        
        $reservationNum = 0;
        if($row){
            $reservationNum = $row[0] + 1;   
        }
        
        oci_bind_by_name($reservationInsert, ":reservationNum", $reservationNum);
        
        $reserveDate = date("d\-M\-y");
        
        oci_bind_by_name($reservationInsert, ":reserveDate", $reserveDate);
        
        $exe = oci_execute($reservationInsert);
        
        print "$username's information has added to the Reservation table.<br>";
}
?>