<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate if all form inputs are provided
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Insert the data into the database
        $query = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
        if(mysqli_query($con, $query)) {
            // JavaScript alert after successful insertion
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            // Display MySQL error if insertion fails
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Responsive Contact Us Form | CodingLab</title>
    <link rel="stylesheet" href="style2.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="left-side">
            <div class="address details">
                <i class="fas fa-map-marker-alt"></i>
                <div class="topic">Address</div>
                <div class="text-one">Kumaraswamy Layout</div>
                <div class="text-two">Bangalore-78</div>
            </div>
            <div class="phone details">
                <i class="fas fa-phone-alt"></i>
                <div class="topic">Phone</div>
                <div class="text-one">+91 9148497494</div>
                <div class="text-two">+91 8310225321</div>
            </div>
            <div class="email details">
                <i class="fas fa-envelope"></i>
                <div class="topic">Email</div>
                <div class="text-one">akash9638thakur@gmail.com</div>
                <div class="text-two">waseemqadir123@gmail.com</div>
            </div>
        </div>
        <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p> you can send me a message from here. It's my pleasure to help you.</p>


            <form class="login" method="POST">
                <div class="input-box">
                    <input type="text" placeholder="Enter your name" name="name">
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Enter your email" name="email">
                </div>
                <div class="input-box message-box">
                    <input type="text" placeholder="Enter your message" name="message">
                </div>

                <div class="button">
                <input type="submit" id="button" class="button" name="submit" value="send now">
                   </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
