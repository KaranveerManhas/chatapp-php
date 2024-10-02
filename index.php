<?php
session_start();
if(isset($_SESSION["userName"]) && isset($_SESSION["phone"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/chatApp/css/styles.css">
    <title>ChatRoom</title>
</head>
<body>
    <h1>ChatRoom</h1>
    <div class="chat">
    <a href="logout.php" id="logout_btn">Logout</a>
        <h2>Welcome <span><?= $_SESSION["userName"] ?></span>!</h2>
        <div class="msg">
            
        </div>
        <div class="input_msg">
            <input type="text" placeholder="Type your message here." id="input_msg">
            <button onclick="update()">Send</button>
        </div>
    </div>
</body>
<script src="js/script.js"></script>
</html>

<?php
}else{

  header("location: login.php");


}
?>