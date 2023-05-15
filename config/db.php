<?php

$host = "localhost";
$user = "root";
$password = "Gbolahankorede*";
$database = "test";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    echo "Error connecting to database " . mysqli_connect_error();
    exit();
}
