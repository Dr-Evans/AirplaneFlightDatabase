#!/usr/local/bin/php    
<html>
<head>
    <title>Admin Page</title>
</head>
<body style="width:100%;">

<h1>Admin Page</h1>

<?php
    include 'printtables.php';
    session_start();
    echo "Welcome, " . $_SESSION['username'] . ".";
?>

<div style="width: 100%;">
   <div style="border:1px solid black;width:15%;height: 80%;overflow:scroll;overflow-y:scroll;overflow-x:hidden;float:left;">
        <h2>Modify Airport</h2>
        <form action="" method="post" name="modify_airport">
            Code: <input type="text" name="modify_airport_code"> </br>
            City: <input type="text" name="modify_airport_city"> </br>
            State: <input type="text" name="modify_airport_state"> </br>
            Name: <input type="text" name="modify_airport_name"> </br>
            <input type="submit" value="modify" name="modify_airport_button" />
            <input type="reset" value="clear" name="modify_airport_clear" />
        </form>
   </div>
   <div style="border:1px solid black;width: 80%;height: 80%;overflow:scroll;overflow-y:scroll;overflow-x:hidden;float:left;">
        <div style="float:left; width: 2%;"></div>
        <div style="float:left; width: auto;">
             <?php
                 $connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');
             
                 printAirportInfo($connection);
             
                 oci_close($connection);
             ?>
        </div>
        <div style="float:left; width: 2%;"></div>
           <div style="float:left; width: auto;">
             <?php
                 $connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');
             
                 printFlightInfo($connection);
             
                 oci_close($connection);
             ?>
        </div>
           <div style="float:left; width: 2%;"></div>
         <div style="float:left; width: auto;">
             <?php
                 $connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');
             
                 printAirplaneInfo($connection);
             
                 oci_close($connection);
             ?>
        </div>
         <div style="float:left; width: 2%;"></div>
         <div style="float:left; width: auto;">
             <?php
                 $connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');
             
                 printPaymentInfo($connection);
             
                 oci_close($connection);
             ?>
        </div>
         <div style="float:left; width: 2%;"></div>
         <div style="float:left; width: auto;">
             <?php
                 $connection = oci_connect('rquan', 'volcom24!!', '//oracle.cise.ufl.edu/orcl');
             
                 printUsernameInfo($connection);
             
                 oci_close($connection);
             ?>
        </div>
   </div>
</div>
<div style="clear:both"></div>
</body>