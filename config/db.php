<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "samrat";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database,
    4306
);

if(!$conn){

    die("Database Connection Failed");

}

?>