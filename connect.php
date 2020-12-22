<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "crud";

    $con = new mysqli($servername, $username, $password, $databasename);

    if($con->connect_error) die("Connection failed: ".$con->connect_error);
    echo "Connected successfully!<br />";
?>
