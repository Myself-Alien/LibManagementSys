<?php
include("assets/links.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login</title>
</head>

<body style="background-color: #00adb5;">
    <div class="container">
        <div class="col-md-4 offset-md-4 pt-3 stu_box">
            <div class="logo pb-3">
                <img src="assets/img/logo.png" class="img-fluid mx-auto d-block">
            </div>
            <form action="login_action.php" method="post" class="reg_box">
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control input" id="email" name="email">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Password</label>
                    <input type="password" class="form-control input" id="email" name="pass">
                </div>
                <p class="btn_align">
                    <input type="submit" class="btn btn-primary input" name="submit" value="Login">
                    <button type="button" class="btn btn-primary input"><a href="reg.php">Registration</a></button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>