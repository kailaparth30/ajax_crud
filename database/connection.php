<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax_crud";

$conn = mysqli_connect($servername,$username,$password,$dbname );

if(!$conn){
    die("connection successfully");
}


?>