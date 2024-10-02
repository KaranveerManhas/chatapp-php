<?php
include "db.php";
session_start();

if(isset($_POST["name"]) && isset($_POST["phone"])){
  
  $name=$_POST["name"];
  $phone=$_POST["phone"];

  $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
  
  if($rq=mysqli_query($db,$q)){

    if(mysqli_num_rows($rq)==1){
      
      $_SESSION["userName"]=$name;
      $_SESSION["phone"]=$phone;
      header("location: index.php");



    }else{


      $q="SELECT * FROM `users` WHERE phone='$phone'";
      if($rq=mysqli_query($db,$q)){
        if(mysqli_num_rows($rq)==1){
          echo "<script>alert($phone+' is already taken by another person')</script>";
        }else{

          $q="INSERT INTO `users`(`uname`, `phone`) VALUES ('$name','$phone')";
          if($rq=mysqli_query($db,$q)){
            $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
            if($rq=mysqli_query($db,$q)){
              if(mysqli_num_rows($rq)==1){

                $_SESSION["userName"]=$name;
                $_SESSION["phone"]=$phone;
                header("location: index.php");

              }
            }

          }

        }
      }
    }
  }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/chatApp/css/login.css">
    <title>ChatRoom</title>
</head>
<body>
    <h1>ChatRoom</h1>
    <h2>Login</h2>
    <form action="" method="post">
        <h3>Username</h3>
        <input type="text" name="name" required>
        <h3>Mobile</h3>
        <input type="number" min="1111111111" max="9999999999" name="phone" required>
        <button type="submit">Login/Register</button>
    </form>
</body>
</html>

