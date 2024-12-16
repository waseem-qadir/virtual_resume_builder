<?php
session_start();
include("db.php");


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $objective = $_POST['objective'];
    $language = $_POST['language'];
    $skill = $_POST['skill'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $hobbies = $_POST['hobbies'];
    $linkedin = $_POST['linkedin'];
    $instagram = $_POST['instagram'];

    if(!empty($username) && !empty($email) && !empty($phone) && !empty($education) && !empty($objective) && !empty($language) && !empty($address) && !empty($skill) && !empty($experience) && !empty($hobbies) && !empty($linkedin) && !empty($instagram)){
        
        if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
            $file_name = $_FILES['profile_pic']['name'];
            $file_tmp = $_FILES['profile_pic']['tmp_name'];
            $folder = 'images/'.$file_name;

            if(move_uploaded_file($file_tmp, $folder)) {
                $query = "INSERT INTO dash (username, email, phone, education, address, objective, language, skill, experience, hobbies, linkedin, instagram, profile_pic) 
                          VALUES ('$username', '$email', '$phone', '$education', '$address', '$objective', '$language', '$skill', '$experience', '$hobbies', '$linkedin', '$instagram', '$folder')
                          ON DUPLICATE KEY UPDATE 
                          email='$email', phone='$phone', education='$education', address='$address', objective='$objective', language='$language', skill='$skill', experience='$experience', hobbies='$hobbies', linkedin='$linkedin', instagram='$instagram', profile_pic='$folder'";

                mysqli_query($con, $query);

                header("Location: retrive.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1520970014086-2208d157c9e2?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
            background-size: cover;
        }
        .container{
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Personal Information</div>

                <div class="card-body">
                    <form class="dash" method="post" enctype="multipart/form-data" onsubmit="return checkForNull();">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Name</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($userData['username']) ? $userData['username'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($userData['email']) ? $userData['email'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo isset($userData['phone']) ? $userData['phone'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="education">Education</label>
                                    <input type="text" class="form-control" id="education" name="education" value="<?php echo isset($userData['education']) ? $userData['education'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="objective">Objective</label>
                                    <textarea class="form-control" id="objective" name="objective"><?php echo isset($userData['objective']) ? $userData['objective'] : ''; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="language">Language</label>
                                    <input type="text" class="form-control" id="language" name="language" value="<?php echo isset($userData['language']) ? $userData['language'] : ''; ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill">Skills</label>
                                    <input type="text" class="form-control" id="skill" name="skill" value="<?php echo isset($userData['skill']) ? $userData['skill'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <input type="text" class="form-control" id="experience" name="experience" value="<?php echo isset($userData['experience']) ? $userData['experience'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="hobbies">Hobbies</label>
                                    <input type="text" class="form-control" id="hobbies" name="hobbies" value="<?php echo isset($userData['hobbies']) ? $userData['hobbies'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo isset($userData['linkedin']) ? $userData['linkedin'] : ''; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo isset($userData['instagram']) ? $userData['instagram'] : ''; ?>">
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="profile_pic">Profile Picture</label>
                                    <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="objective">About Me</label>
                                    <textarea class="form-control" id="address" name="address"><?php echo isset($userData['address']) ? $userData['address'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

    if (document.getElementById('username').value === ""  || document.getElementById('email').value === "" || document.getElementById('phone').value === ""  || document.getElementById('education').value === ""  || document.getElementById('objective').value === ""  || document.getElementById('language').value === ""  || document.getElementById('skill').value === ""  || document.getElementById('experience').value === ""  || document.getElementById('hobbies').value === "" || document.getElementById('linkedin').value === ""  || document.getElementById('instagram').value === "") {
        alert("Blank fields not allowed");
        return false;
    }
    if (!validateEmail() || !validatePhone()) {
        return false;
    }

    return true;
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
