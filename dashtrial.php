<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=="POST") {
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

    if(!empty($username) && !empty($email) && !empty($phone) && !empty($education) && !empty($address) && !empty($objective) && !empty($language) && !empty($skill) && !empty($experience) && !empty($hobbies) && !empty($linkedin) && !empty($instagram)){

        
        if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
            $file_name = $_FILES['profile_pic']['name'];
            $file_tmp = $_FILES['profile_pic']['tmp_name'];
            $folder = 'images/'.$file_name;

            
            if(move_uploaded_file($file_tmp, $folder)) {

                
                $query = "INSERT INTO dash (username, email, phone, education, address, objective, language, skill, experience, hobbies, linkedin, instagram, profile_pic) VALUES ('$username', '$email', '$phone', '$education', '$address', '$objective', '$language', '$skill', '$experience', '$hobbies', '$linkedin', '$instagram', '$folder')";

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
    <link rel="stylesheet" href="dashstyle.css">
</head>
<body>

<div class="container">
  
    <form class="dash" method="post" enctype="multipart/form-data" onsubmit="return checkForNull();">
            
    <div class="perso_cont">
            
            <h2>personal information</h2> <br>
            
            <div class="input_pair">
            <label for="name">Name</label><br>
            <input type="text" id="username" name="username"><br>
           </div>
           
           <div class="input_pair">
           <label for="email">Email</label><br>
           <input type="email" id="email" name="email"><br>
           </div>
           
           <div class="input_pair">
            <label for="phone">Phone</label><br>
            <input type="tel" id="phone" name="phone"><br>
             </div>           
            
             <div class="input_pair">
            <label for="education">Education</label><br>
            <input type="text" id="education" name="education"><br>
            </div>

            <div class="input_pair">
            <label for="experience">about me</label><br>
            <textarea id="address" name="address"></textarea><br>
            </div>
            
            <div class="input_pair">
            <label for="experience">objective</label><br>
            <textarea id="objective" name="objective"></textarea><br>
            </div>

            <div class="input_pair">
            <label for="education">language</label><br>
            <input type="text" id="language" name="language"><br>
            </div>
    
            <div class="input_pair">
            <label for="education">skills</label><br>
            <input type="text" id="skill" name="skill"><br>
            </div>

            <div class="input_pair">
            <label for="education">experience</label><br>
            <input type="text" id="experience" name="experience"><br>
            </div>

            <div class="input_pair">
            <label for="education">hobbies</label><br>
            <input type="text" id="hobbies" name="hobbies"><br>
            </div>

            <div class="input_pair">
            <label for="education">linkedin</label><br>
            <input type="text" id="linkedin" name="linkedin"><br>
            </div>

            <div class="input_pair">
            <label for="education">instagram</label><br>
            <input type="text" id="instagram" name="instagram"><br>
            </div>
            
        </div>
            
        
        <div class="input_pair">
            <label for="profile_pic">Profile Picture</label><br>
            <input type="file" id="profile_pic" name="profile_pic"><br>
        </div>
        
        <button onclick="" class="button" type="submit">submit</button>
    </form>
        
</div>

<script>
function checkForNull() {
    if (document.getElementById('username').value === ""  || document.getElementById('email').value === "" || document.getElementById('phone').value === ""  || document.getElementById('education').value === ""  || document.getElementById('address').value === ""  || document.getElementById('objective').value === ""  || document.getElementById('language').value === ""  || document.getElementById('skill').value === ""  || document.getElementById('experience').value === ""  || document.getElementById('hobbies').value === "" || document.getElementById('linkedin').value === ""  || document.getElementById('instagram').value === "") {
        alert("Blank fields not allowed");
        return false;
    }
    return true;
}
</script>

</body>
</html>


