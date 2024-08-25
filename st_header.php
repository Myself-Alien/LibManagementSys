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
include("assets/links.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>

<body>
    <div class="container-fluid g-0 pt-3 pb-3 header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </div>
                <div class="col-md-3 align-middle d-flex flex-column right_pen">
                    <p class="ms-auto p-2 clock" id="clock"></p>
                    <div class="ms-auto p-2">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center navbar-custom">
        <div class="container">
            <a href="" class="navbar-brand d-flex w-50 me-auto wl_note">Welcome, <?php echo "$fname" . " " . "$lname"; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                <!--
            <ul class="navbar-nav w-100 justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="//codeply.com">Codeply</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            -->
                <ul class="nav navbar-nav ms-auto w-100 justify-content-end st_menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Issued Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                        <div class="dropdown-menu dropdown-menu-end drop_no_pedd">
                            <a href="#" class="dropdown-item drop_no_pedd">
                                <img src="<?php echo ($img); ?>" alt="Profile" style="height: 150px; width: 150px;">
                            </a>
                            <a href="st_profile.php" class="dropdown-item st_drop_header drop_no_pedd"><?php echo "$fname" . " " . "$lname"; ?></a>
                            <div class="dropdown-divider devider_nomargin"></div>
                            <a href="logout.php" class="dropdown-item st_drop_header_out drop_no_pedd">Log Out</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <script>
        setInterval(() => {
            const now = new Date();
            const dateString = now.toLocaleDateString(); // Get the current date
            const timeString = now.toLocaleTimeString(); // Get the current time
            document.getElementById('clock').textContent = `${timeString} ${dateString}`; // Update the <p> tag
        }, 1000);
    </script>
</body>

</html>