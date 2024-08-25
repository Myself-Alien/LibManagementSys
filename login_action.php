<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";

// Check connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    //echo "Connection Successful!"."<br>";
}

// Get email and password from the form
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
}

// Prepare and execute the query
$stmt = $conn->prepare("SELECT pass FROM student_reg WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    $hashed_password = $row['pass'];

    // Verify the password
    if(password_verify($pass, $hashed_password))
    {
        // Password is correct, set session variables
        $_SESSION['email'] = $email;
        echo "Login Successful! Redirecting!";
        header("refresh:2;url=st_dash.php");
    }
    else
    {
        echo "Invalid Password!";
    }
}
else
{
    echo "No User Found!";
}
mysqli_close($conn);
?>