<?php 
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{

$username = $_POST['username'];
$pass = $_POST['pass'];

if(!empty($username) && !empty($pass) && !is_numeric($username)){

    $query="select * from form where username = '$username' limit 1"; 
    $result=mysqli_query($con,$query);
     
    if($result)
    {
        if($result && mysqli_num_rows($result)>0 )
        {
            $user_data= mysqli_fetch_assoc($result);

            if($user_data['pass']== $pass){
                header("location: dash.php");
                die();
            }
        }
    }

    echo "<script type='text/javascript'> alert('wrong username or password') </script>"; 
}
else{
    echo "<script type='text/javascript'> alert('wrong username or password') </script>"; 
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
    <form class="login" method="POST" onsubmit="return checkForNull();">
            <div class="form" >
                

                    <h2 class="head">login</h2>
                    <div class="form-data">
                       

                            
                            
                            <input type="text" id="username" name="username" placeholder="username"> <br>
                            
                            <input type="password" id="pass" name="pass" placeholder="password"> <br>
                        
                            
                        <a href="lostpass.php" class="lost-pass">lost password?</a> <br>

                        <button onclick="" class="button" type="submit">login</button>
                        
                    </div>
            </div>
        </form> 
    </div>

    <script>
        function checkForNull() {
            if (document.getElementById('username').value === ""  || document.getElementById('pass').value === "") {
				alert("Blank fields not allowed");
				return false;
			}
			return true;
        }
    </script>
    
</body>
</html>