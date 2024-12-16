<?php 
session_start();
include("db.php");

// Login Logic
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['login'])) {
    $username = $_POST['login_username'];
    $pass = $_POST['login_pass'];

    if(!empty($username) && !empty($pass) && !is_numeric($username)){
        $query = "SELECT * FROM form WHERE username = '$username' LIMIT 1"; 
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['pass'] == $pass) {
                header("location: select.php");
                die();
            } else {
                echo "<script type='text/javascript'> alert('Wrong username or password') </script>"; 
            }
        } else {
            echo "<script type='text/javascript'> alert('Wrong username or password') </script>"; 
        }
    } else {
        echo "<script type='text/javascript'> alert('Wrong username or password') </script>"; 
    }
}

// Signup Logic
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['signup'])) {
    $username = $_POST['signup_username'];
    $email = $_POST['signup_email'];
    $pass = $_POST['signup_pass'];

    if (!empty($username) && !empty($pass) && !empty($email)) {
        // Check if username already exists
        $check_query = "SELECT * FROM form WHERE username = '$username'";
        $result = mysqli_query($con, $check_query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script type='text/javascript'> alert('Username already exists. Please choose a different username.') </script>";
        } else {
            // Check password requirements
            if (preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/', $pass)) {
                $query = "INSERT INTO form(username, email, pass) VALUES ('$username', '$email', '$pass')";
                mysqli_query($con, $query);
                echo "<script type='text/javascript'> alert('Successfully registered') </script>";
            } else {
                echo "<script type='text/javascript'> alert('Password must be 8 characters long and contain at least one uppercase letter and one special character') </script>";
            }
        }
    } else {
        echo "<script type='text/javascript'> alert('Enter valid information') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Resume Builder</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h1 class="heading">Virtual Resume Builder</h1>
        <h3 class="title">Login/Signup</h3>
    </header>

    <div class="container">
        <div class="slider"></div>
        <div class="btn">
            <button class="login">Login</button>
            <button class="signup">Signup</button>
        </div>

        <div class="form-section">
            <!-- Login Form -->
            <form class="login-form" method="POST" onsubmit="return checkForNullLogin();">
                <div class="login-box">
                    <input type="text" class="email ele" name="login_username" placeholder="Username">
                    <input type="password" class="password ele" name="login_pass" placeholder="Password">
                    <button type="submit" name="login" class="clkbtn">Login</button>
                </div>
            </form>

            <!-- Signup Form -->
            <form class="signup-form" method="POST" onsubmit="return checkForNullSignup();">
                <div class="login-box">
                    <input type="text" class="email ele" name="signup_username" placeholder="Username">
                    <input type="email" class="email ele" name="signup_email" placeholder="Email">
                    <input type="password" class="password ele" name="signup_pass" placeholder="Password">
                    <button type="submit" name="signup" class="clkbtn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        function checkForNullLogin() {
            if (document.querySelector('.login-form .email').value === "" ||  document.querySelector('.login-form .password').value === "") {
                alert("Blank fields not allowed");
                return false;
            }
            return true;
        }

        function checkForNullSignup() {
            if (document.querySelector('.signup-form .email').value === "" ||  document.querySelector('.signup-form .password').value === "" ||  document.querySelector('.signup-form .signup_username').value === "") {
                alert("Blank fields not allowed");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
