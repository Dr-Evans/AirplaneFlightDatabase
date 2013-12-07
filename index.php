#!/usr/local/bin/php    
<html>
<head>
    <title>Homepage</title>
</head>
<body>

<h1>Airplane Flight Database</h1>
<h3>By: <a href="http://github.com/Dr-Evans">Nick Evans</a> and Ron Quan</h3>

<h2>Login</h2>
<form action="" method="post" name="login">
    Username: <input type="text" name="login_username_text"> </br>
    Password: <input type="password" name="login_password_text"> </br>
    <input type="submit" value="login" name="login_login_button" />
    <input type="reset" value="clear" name="login_reset_button" />
</form>

<h2>Register</h2>
<form action="" method="post" name="register">
    Username: <input type="text" name="register_username_text"> </br>
    Password: <input type="password" name="register_password_text"> </br>
    Name: <input type="text" name="register_name_text"> </br>
    Address: <input type="text" name="register_address_text"> </br>
    Email: <input type="text" name="register_email_text"> </br>
    Phone Number (123-456-7890): <input type="text" name="register_phone_text"> </br>
    <input type="submit" value="register" name="register_register_button" />
    <input type="reset" value="clear" name="register_reset_button" />
</form>


<?php
include 'admin.php';
include 'customer.php';
include 'register.php';
include 'printquery.php';



//Main PHP
$connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');

if(!$connection){
	echo "Connection could not be established";
	die();
}

//If values are set and login_button is clicked, perform isAdmin
if(isset($_POST['login_username_text']) && isset($_POST['login_password_text']) && isset($_POST['login_login_button'])){
	$username = $_POST["login_username_text"];
	$password = $_POST["login_password_text"];
	
	if(checkIfAdmin($username, $password, $connection)){
		print "Welcome $username. Admin priviledges granted<br>";
		
		oci_close($connection);
		
		session_start();
		$_SESSION['username'] = $username;
		
		ob_start();

		$url = "adminpage.php";
		
		while(ob_get_status()){
			ob_end_clean();
		}
		header("Location: $url");
	}
	else if(checkIfCustomer($username, $password, $connection)){
		print "Welcome $username<br>";
		
		oci_close($connection);
		
		session_start();
		$_SESSION['username'] = $username;
		
		ob_start();

		$url = "customerpage.php";
		
		while(ob_get_status()){
			ob_end_clean();
		}
		header("Location: $url");
	}
}
//If register_button is pressed
if(isset($_POST['register_username_text']) && isset($_POST['register_password_text']) && isset($_POST['register_register_button'])){
	$username = $_POST["register_username_text"];
	$password = $_POST["register_password_text"];
	$name = $_POST["register_name_text"];
	$address = $_POST["register_address_text"];
	$email = $_POST["register_email_text"];
	$phone = $_POST["register_phone_text"];
	
	if (checkIfCustomer($username, $password, $connection)){
		print "$username already exists<br>";
	}
	else{
		register($username, $password, $name, $address, $email, $phone, $connection);
		print "$username was successfully registered<br>";
	}
}

$statement = oci_parse($connection, "SELECT * FROM Airport");
if(!$statement){
	echo "Parsing could not be made";
	die();
}

$exe = oci_execute($statement);
if(!$exe){
	echo "Query could not be made";
	die();
}

print "<br>";
print "Below is a sample layout of a query using printQuery():<br>";
printQuery($statement);

//Close connections
oci_free_statement($statement);
oci_close($connection);
?>


</body>
</html>
