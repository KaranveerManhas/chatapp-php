
<?php
session_start();
include "db.php";
$msg = $_GET["msg"];
$phone = $_SESSION["phone"];
$uname = $_SESSION["userName"];

$msg = mysqli_real_escape_string($db, $msg);

$q = "SELECT * FROM `users` WHERE phone='$phone'";
if ($rq = mysqli_query($db, $q)) {
  if (mysqli_num_rows($rq) == 1) {

    $q = "INSERT INTO `msg`(`phone`, `msg`, `uname`) VALUES ('$phone','$msg', '$uname')";
    $rq = mysqli_query($db, $q);


  }
}

?>