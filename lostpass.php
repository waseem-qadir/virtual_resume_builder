<?php 
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{

$username = $_POST['username'];
$email= $_POST['email'];
$pass = $_POST['pass'];

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
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-container">
    <form class="signup" method="POST" onsubmit="return checkForNull();">
            <div class= "form" >
                    <h2 class="head">create new account</h2>
                    <div class="form-data">
                            <input type="text" id="username" name="username" placeholder="username"> <br>
                            <input type="text" id="email"    name="email"  placeholder="email"><br>
                            <input type="password" id="pass" name="pass" placeholder="password"> <br>
                            
                         <a href="form.php" class="lost-pass">back</a> <br>
                         <button onclick="" type="submit" class="button">sign up</button>
                        
                    </div>
            </div>
        </form> 
    </div>
        <script>
        function checkForNull() {
            if (document.getElementById('username').value === "" || document.getElementById('email').value === "" || document.getElementById('pass').value === "") {
				alert("Blank fields not allowed");
				return false;
			}
			return true;
        }
    </script>

    
</body>
</html>