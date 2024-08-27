<?php
include("assets/links.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration</title>
</head>

<body style="background-color: #00adb5;">
    <div class="container">
        <div class="col-md-4 offset-md-4 pt-3 stu_box">
            <div class="logo pb-3">
                <img src="assets/img/logo.png" class="img-fluid mx-auto d-block">
            </div>
            <form action="reg_action.php" method="post" class="reg_box" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control input" id="fname" name="fname">
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control input" id="lname" name="lname">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control input" id="email" name="email">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Password</label>
                    <input type="password" class="form-control input" id="email" name="pass">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="img" class="form-label">Image</label>
                    <pre><input type="file" class="form-control input" id="img" name="img"></pre>
                </div>
                <input type="submit" class="btn btn-primary input" name="submit">
                <button type="button" class="btn btn-primary input reg_back" name="submit" value="Back">
                    <a href="index.php">Back</a>
                </button>
            </form>
        </div>
    </div>
</body>

</html>