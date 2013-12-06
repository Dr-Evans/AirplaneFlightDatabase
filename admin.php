<?php
//Checks if username and password exists in Admin
function checkIfAdmin($username, $password, $connection){
	$query = oci_parse($connection, "SELECT COUNT(*) AS count
					FROM Admin
					WHERE username = :username AND password = :password");
	
	oci_bind_by_name($query, ":username", $username);
	oci_bind_by_name($query, ":password", $password);
	
	oci_execute($query);
	
	$row = oci_fetch_array($query);
	
	if ($query && $row[0] != 0){
		print "<b>$username is an admin. :)</b><br>";
		return true;
	}
	else{
		print "<b>$username is not an admin. :(</b><br>";
		return false;
	}
}


?>