<?php
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    echo "Login First";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("ERROR!" . mysqli_connect_error());
}

$sql = "SELECT fname, lname, img FROM student_reg WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $lname = $row['lname'];
    $img = $row['img'];
} else {
    echo "No User Found!";
}

mysqli_close($conn);
?>
<?php
include("assets/links.php");
include("st_header.php");
?>
<div class="container-fluid g-0 st_content pb-3 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="">
                    <div class="card fcard">
                        <div class="card-body fcard_body">
                            <blockquote class="blockquote mb-0">
                                <p><img src="assets/img/listed.png" alt="Books Listed" class="fcard_img"></p>
                                <footer>11</footer>
                            </blockquote>
                        </div>
                        <div class="card-header fcard_head">
                            Book Listed
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="">
                    <div class="card fcard">
                        <div class="card-body fcard_body">
                            <blockquote class="blockquote mb-0">
                                <p><img src="assets/img/return.png" alt="Book Not Return" class="fcard_img"></p>
                                <footer>11</footer>
                            </blockquote>
                        </div>
                        <div class="card-header fcard_head">
                            Book Not Return
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="">
                    <div class="card fcard">
                        <div class="card-body fcard_body">
                            <blockquote class="blockquote mb-0">
                                <p><img src="assets/img/issued.png" alt="Book Issued" class="fcard_img"></p>
                                <footer>11</footer>
                            </blockquote>
                        </div>
                        <div class="card-header fcard_head">
                            Book Issued
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid g-0">
    <img src="assets/img/Banner.jpg" alt="Banner" class="img-fluid">
</div>
<?php
include("st_footer.php");
?>