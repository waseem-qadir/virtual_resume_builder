<?php

session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email= $_POST['email'];
    $phone=$_POST['phone'];
    $education=$_POST['education'];
    $address=$_POST['address'];
    $objective=$_POST['objective'];
    $language=$_POST['language'];
    $skill=$_POST['skill'];
    $experience=$_POST['experience'];
    $hobbies=$_POST['hobbies'];
    $linkedin=$_POST['linkedin'];
    $instagram=$_POST['instagram'];
    $role=$_POST['role']; 

    if (!empty($username) && !empty($email) && !empty($phone) && !empty($education) && !empty($address) && !empty($objective) && !empty($language) && !empty($skill) && !empty($experience) && !empty($hobbies) && !empty($linkedin) && !empty($instagram) && !empty($role)) {

        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
            $file_name = $_FILES['profile_pic']['name'];
            $file_tmp = $_FILES['profile_pic']['tmp_name'];
            $folder = 'images/'.$file_name;

            
            if (move_uploaded_file($file_tmp, $folder)) {
                $query="INSERT INTO dash3(username,email,phone,education,address,objective,language,skill,experience,hobbies,linkedin,instagram,role,profile_pic) VALUES ('$username','$email','$phone','$education','$address','$objective','$language','$skill','$experience','$hobbies','$linkedin','$instagram','$role','$folder')";

                mysqli_query($con, $query);
                header("Location: retrive3.php");
                exit();
            } else {
                echo "<script type='text/javascript'> alert('Error moving file to destination folder') </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Error uploading file') </script>";
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
    <title>Teacher Resume</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1520970014086-2208d157c9e2?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Replace 'path/to/your/background/image.jpg' with the actual path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .container {
            background-color:white;
           // background-color: rgba(255, 255, 255, 0.8); /* Adjust the opacity as needed */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
<form class="dash" method="post" enctype="multipart/form-data" onsubmit="return checkForNull();">
    <h2 class="mt-3">Personal Information</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" class="form-control" id="role" name="role">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="education">Education</label>
                <input type="text" class="form-control" id="education" name="education">
            </div>
            <div class="form-group">
                <label for="address">About Me</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="form-group">
                <label for="objective">Objective</label>
                <textarea class="form-control" id="objective" name="objective"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language">
            </div>
            <div class="form-group">
                <label for="skill">Skills</label>
                <input type="text" class="form-control" id="skill" name="skill">
            </div>
            <div class="form-group">
                <label for="experience">Experience</label>
                <input type="text" class="form-control" id="experience" name="experience">
            </div>
            <div class="form-group">
                <label for="hobbies">Hobbies</label>
                <input type="text" class="form-control" id="hobbies" name="hobbies">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control" id="instagram" name="instagram">
            </div>
            <div class="form-group">
                <label for="profile_pic">Profile Picture</label>
                <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
</form>

</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
 function validateEmail() {
    var email = document.getElementById('email').value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Invalid email format");
        return false;
    }
    return true;
}

function validatePhone() {
    var phone = document.getElementById('phone').value;
    var phonePattern = /^\d{10}$/;
    if (!phonePattern.test(phone)) {
        alert("Invalid phone number. It should be a 10-digit number.");
        return false;
    }
    return true;
}

function checkForNull() {
    if (document.getElementById('username').value === "" || 
        document.getElementById('email').value === "" || 
        document.getElementById('phone').value === "" || 
        document.getElementById('education').value === "" || 
        document.getElementById('address').value === "" || 
        document.getElementById('objective').value === "" || 
        document.getElementById('language').value === "" || 
        document.getElementById('skill').value === "" || 
        document.getElementById('experience').value === "" || 
        document.getElementById('hobbies').value === "" || 
        document.getElementById('linkedin').value === "" || 
        document.getElementById('instagram').value === "" || 
        document.getElementById('role').value === "") {
        alert("Blank fields not allowed");
        return false;
    }
        if (!validateEmail() || !validatePhone()) {
        return false;
    }
        return true;
    }
</script>

</body>
</html>