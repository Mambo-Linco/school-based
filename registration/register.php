<?php
include ("dbconfig.php");
if (isset($_POST["submit"])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST["password"]);
    $cpass = md5($_POST["cpassword"]);
    $user_type = $_POST['cpassword'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass'";
    $result = mysqli_query($db, $select);
    if(mysqli_num_rows(($result)> 0)) {
        $error[] = 'User already exist';
    }else{
        if($pass != $cpass){
            $error[] = 'password not matched';
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')";
            mysqli_query($db, $insert);
            header('location:login_form.php');
        }
    }


};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Register now</h3>
            <?php 
            if (isset($error)){
                foreach($error as $query){
                    echo '<span class ="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text " name="name" required placeholder="enter your name">
            <input type="email " name="email" required placeholder="enter your email">
            <input type="password " name="password" required placeholder="enter your password">
            <input type="password " name="cpassword" required placeholder="confirm your password">
            <select name="user_type" id="">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">Login</p>





        </form>

    </div>
    
</body>
</html>