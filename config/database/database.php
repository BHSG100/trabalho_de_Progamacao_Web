<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "root";
$database = "trabalho";
$con = new mysqli($localhost, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}