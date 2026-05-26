<?php

$host = "sql206.infinityfree.com";
$user = "if0_42015353";
$password = "lZxrOgDZMws8e";
$database = "if0_42015353_samrat";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if(!$conn){

    die("Database Connection Failed: " . mysqli_connect_error());

}

?>