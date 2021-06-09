<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "inventory";

//Create Connection
$conn = new mysqli($server, $username, $password, $database);

//Check Connection

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connection_error);
} else {
   # echo "Connected Successfully";
}

?>