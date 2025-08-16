<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "auth-db";

$conn = new mysqli($servername, $username, $password, $database);

if(!$conn) {
    die("Connection Failed. " . $conn->connect_error);
}