<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("ERROR!" . mysqli_connect_error());
} else {
    echo "Database Connected!<br>";
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Hash the password before storing it
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]); 
    $uploadOk = 1; 
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["img"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            // Use the hashed password in the SQL query
            $sql = "INSERT INTO student_reg (fname, lname, email, pass, img) VALUES ('$fname', '$lname', '$email', '$hashed_password', '$target_file')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<pre>"."First Name : $fname"."<pre>";
                echo "<pre>"."Last Name : $lname"."<pre>";
                echo "<pre>"."Email : $email"."<pre>";
                echo "<pre>"."Image : $target_file"."<pre>";
                echo "Registration Successful!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

mysqli_close($conn);
header("refresh:4;url=index.php");
?>
