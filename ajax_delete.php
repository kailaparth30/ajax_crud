<?php
include('database/connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM crud_ajax WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('location:ajax_index.php');
}
