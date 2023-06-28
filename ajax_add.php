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

        <form id="uploadform" enctype="multipart/form-data">

            <div class="form-group">
                <label for="" class="col-form-label">fistname</label>
                <input type="text" class="form-control" name="first_name" id="firstname" Required>
            </div>

            <div class="form-group">
                <label for="" class="col-form-label">lastname</label>
                <input type="text" class="form-control" name="last_name" id="lastname" Required>
            </div>

            <div class="form-group">
                <label for="" class="col-form-label">email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>

            <label>gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Male" name="gender">
                <label class="form-check-label" for="gender">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Female" name="gender">
                <label class="form-check-label" for="gender">
                    Female
                </label>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputEmail1">Select image</label>
                <input type="file" id="myFile" name="image_upload">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label">phonenumber</label>
                <input type="number" class="form-control" name="phone_number" id="phonenumber">
            </div>

            <!-- <button id="#btn" class="btn btn-info" type="submit" name="submit" value="submit">submit</button> -->

            <input type="submit" class="btn btn-info" name="submit" value="submit">

        </form>
    </div>
</body>

<script>
    $(document).ready(function(e) {
        $('#uploadform').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: "POST",
                url: "ajax_added.php",
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                success: function(date) {
                    location.href = '/ajaxcrud/ajax_index.php'
                }
            });
        });
    });
</script>


</html>