<?php
include("database/connection.php");

$id = $_GET['id'];
$sql = " SELECT * FROM crud_ajax WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$id = $_GET['id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$gender = $row['gender'];
$image_upload = $row['image_upload'];
$phone_number = $row['phone_number'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ajax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">

        <form id="uploadform" method="POST">

            <div class="form-group">
                <label for="" class="col-form-label">fistname</label>
                <input type="text" class="form-control" name="first_name" id="firstname" value="<?php echo $first_name; ?>">
            </div>

            <div class="form-group">
                <label for="" class="col-form-label">lastname</label>
                <input type="text" class="form-control" name="last_name" id="lastname" value="<?php echo $last_name; ?>">
            </div>

            <div class="form-group">
                <label for="" class="col-form-label">email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
            </div>

            <label>gender</label>
            <div class="form-check">
                <input <?php if ($gender == "male") {
                            echo "checked";
                        } ?> type="radio" name="gender" id="gender" value="male"> male
            </div>
            <div class="form-check">
                <input <?php if ($gender == "female") {
                            echo "checked";
                        } ?> type="radio" name="gender" id="gender" value="female"> female
            </div>
            <br>
            <div class="form-group">
                <label for="" class="col-form-label">image upload</label>
                <input type="file" name="<?php echo $image_upload ?>" id="imageupload">
            </div>

            <div class="form-group">
                <label for="" class="col-form-label">phonenumber</label>
                <input type="number" class="form-control" name="phone_number" id="phonenumber" value="<?php echo $phone_number ?>">
            </div>

            <input type="submit" class="btn btn-info" name="submit" value="update" id="update">

        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#uploadform').on('submit', function(e) {
            event.preventDefault();
            var from = new FormData(this);
            from.append("id", "<?php echo $id; ?>");
            console.log(from);
            $.ajax({
                type: "POST",
                url: "http://localhost:81/ajaxcrud/ajax_updated.php",
                data: from,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    location.href = '/ajaxcrud/ajax_index.php'
                },
            });
        });
    });
</script>

</html>