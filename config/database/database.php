<?php
$localhost = "localhost";
$username = "root";
$password = "root";
$database = "trabalho";
$con = mysqli($localhost, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}