<?php
//Checks if username and password exists in User
function checkIfCustomer($username, $password, $connection){
	$query = oci_parse($connection, "SELECT COUNT(*) AS count
					FROM Customer
					WHERE username = :username AND password = :password");
	
	oci_bind_by_name($query, ":username", $username);
	oci_bind_by_name($query, ":password", $password);
	
	oci_execute($query);
	
	$row = oci_fetch_array($query);
	
	if ($query && $row[0] != 0){
		print "<b>$username is a customer. :)</b><br>";
		return true;
	}
	else{
		print "<b>$username is not a customer. :(</b><br>";
		return false;
	}
}
?>