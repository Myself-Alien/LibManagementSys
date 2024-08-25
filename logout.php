<?php 
session_start();
session_unset();
session_destroy();
echo "Redirect Please Wait!";
header("location:index.php");
exit();
?>