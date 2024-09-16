<?php
include ("dbconfig.php");

session_start();

if (isset($_POST["submit"])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST["password"]);
    $cpass = md5($_POST["cpassword"]);
    $user_type = $_POST['cpassword'];

$select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass'";
    $result = mysqli_query($db, $select);
    if(mysqli_num_rows(($result)> 0)) {
        $row = mysqli_fetch_array($result);
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location.admin.php');
        }else{($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location.user_name.php');

        }
    }


};
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Login now</h3>
            <input type="text " name="name" required placeholder="enter your name">
            <input type="email " name="email" required placeholder="enter your email">
            <input type="password " name="password" required placeholder="enter your password">
            <input type="password " name="password" required placeholder="confirm your password">
            <p>Don't have an account? <a href="register_form.php">Login</p>





        </form>

    </div>
    
</body>
</html>