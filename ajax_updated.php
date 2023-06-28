<?php

include("database/connection.php");

if (isset($_POST)) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];

    $sql = "UPDATE crud_ajax SET first_name ='$first_name',last_name ='$last_name', email='$email', gender='$gender',phone_number='$phone_number' WHERE id ='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    }
}
