<?php
include('database/connection.php');
if (isset($_POST)) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];

    if (isset($_FILES['image_upload']['name'])) {
        $image_upload = $_FILES['image_upload']['name'];
        if ($image_upload != "") {

            $source_path = $_FILES['image_upload']['tmp_name'];

            $destination_path = "image/" . $image_upload;
            $upload = move_uploaded_file($source_path, $destination_path);
        }
    } else {
        $image_upload = "";
    }

    $sql = "SELECT * FROM `crud_ajax` WHERE `image_upload`= '$image_upload'";

    $result = mysqli_query($conn, $sql);
    $numofrom = mysqli_num_rows($result);

    $sql = "INSERT INTO `crud_ajax`(`first_name`, `last_name`, `email`, `gender`, `image_upload`, `phone_number`) VALUES ('$first_name','$last_name','$email','$gender','$image_upload','$phone_number')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    }
}
