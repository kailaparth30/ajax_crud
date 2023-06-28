<?php
include('database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADD DATA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <h1>AJAX DATA ADD</h1>
            <a href="ajax_add.php" class="btn btn-primary">ADD DATA</a>
            <table id="example" class="table table-striped table-bordered mt-4" style="width:100%">
                <thead>
                    <th>id</th>
                    <th>first Name</th>
                    <th>last Name</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>imageupload</th>
                    <th>phonenumber</th>
                    <th>
                        <center>Update</center>
                    </th>
                    <th>
                        <center>Delete</center>
                    </th>
                </thead>

                <?php

                $sql = "SELECT * FROM crud_ajax";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $id = $rows['id'];
                        $first_name = $rows['first_name'];
                        $last_name = $rows['last_name'];
                        $email = $rows['email'];
                        $gender = $rows['gender'];
                        $image_upload = $rows['image_upload'];
                        $phone_number = $rows['phone_number'];


                ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td>
                                <img class="w-50" src="<?php echo "image/" . $rows['image_upload']; ?>" alt="Image">
                            </td>
                            <td><?php echo $phone_number; ?></td>
                            <td>
                                <center>
                                    <a href="<?php ?>ajax_update.php?id=<?php echo $id; ?>" class="btn btn-primary" id="update">Update</a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="<?php ?>ajax_delete.php?id=<?php echo $id; ?>" class="btn btn-danger" id="delete">Delete</a>
                                </center>
                            </td>
                        </tr>
                <?php
                    }
                }

                ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#delete').click(function() {
            var id = $('#delete').val()
            $.ajax({
                type: "GET",
                url: "http://localhost:81/ajaxcrud/ajax_delete.php",
                data: "id",
                success: function(data) {
                    location.href = '/ajaxcrud/ajax_index.php'
                }
            });
        });
    });
</script>

</html>