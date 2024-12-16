<?php 
session_start();
include("db.php");

// Query to select the last inserted row from the dash table
$query = "SELECT * FROM dash ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);

// Check if a row is returned
if (mysqli_num_rows($result) == 1) {
    // Fetch the row
    $row = mysqli_fetch_assoc($result);

    // Start HTML output for resume format
    echo " <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>resume</title>
        <style>
        .img {
            height: 250px;
            border-radius: 100%;
            margin-top: 6px;
            background-color: grey;
           
           
            
        }
        
        .resume {
        
            width: 900px;
            display: flex;
            justify-content: center;
            margin: 0 auto;
            border: 1px solid black;
           // padding: 20px;
            box-sizing: border-box; /* Include padding and border in the width */
        }
        
        .row {
            width: 30%;
            display: flex;
            flex-wrap: wrap;
            overflow: hidden;
            flex-direction: column;
            padding: 10px;
            box-sizing: border-box; /* Include padding in the width */
            background-color:lightgrey;
        }
        
        .row2 {
            width: 70%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            padding: 10px;
            box-sizing: border-box; /* Include padding in the width */
            
        }
        
        .section-title {
            margin-bottom: 10px;
            height: 200px;
          // border: 1px solid red;
           width: 100%;
           overflow-wrap: break-word;
           
        }
        
        .section-title h2 {
            margin: 0;
        }
        
        .username {
            margin-top: auto;
            margin-bottom: 20px;
            font-size: 45px;
           // border: 1px solid red;
            font-family:Arial, Helvetica, sans-serif ;
            font-weight: bold;
            color: hsl(210, 6%, 33%);
        }
        
        hr {
            margin: 10px 0;
            border: none;
            border-top: 1px solid black;
        }
    
        h2{
            font-family:Arial, Helvetica, sans-serif ;
            font-weight: bold;
            color: hsl(210, 7%, 27%);
            background-color:lightgrey ;
            padding: 10px;
            
        }

        .downld{
            height: 50px;
            background-color:black;
            margin-bottom: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            
            
           
            
        }
    
        .downlo{
           
            padding: 10px;
            justify-content: center;
            width: 80px;
            height: 30px;
            color: azure;
            background-color: hsl(213, 78%, 57%);
            border-radius: 4px;
            border: none;
            margin-right: 10px;
             
        }
    
        .downlo:hover{
            background-color: rgb(16, 77, 130);
            color: azure;
        }
    
        body{
            margin:0;
            padding:0;
    
        }
        
    </style>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js'></script>
    
    
    </head>
    <body>

         <div class='downld'>
                 <button type='submit' name='download' class='downlo' id='downloadButton'>Download</button>
         </div>
    


        <div class='resume'>
            <div  class='row'>
                
    
                    <img src='logo4.jpg' class='img' alt='error'>
                    
                
                
                
                
                <div class='section-title'><h2>contact</h2>
                    
                    <p>+91  "  . $row['phone'] ."</p>
                    <p> " . $row['email'] . "</p>
                    <p class='linkedin'>" .$row['linkedin']."</p>
                    <p class='instagram'>" .$row['instagram']."</p> 
                    
                    
                </div>
                
                <div class=section-title><h2>Education</h2>
                    
                    <p>" . $row['education'] . "</p>
                </div>
                
                <div class='section-title'><h2>language</h2>
                    
                    <p class='language'>" .$row['language']."</p>
                </div>
                
                <div class='section-title'><h2>hobbies</h2>
                    
                    <p class='hobbies'>" .$row['hobbies']."</p>
                </div>
                
            </div>
            
            <div class='row2'>
                
                <p class='username'> " . $row['username'] . "</p>
                
                <hr>
                    
                <div class='section-title'><h2>about me</h2>
                     <p class='address'>" .$row['address']."    
                    </p>
                </div>
                      
                <div class=section-title><h2>Experience</h2>
                        <p class='exp'>" . $row['experience'] . "</p>
                        </div>
                    
                    
                    
                    <div class='section-title'><h2>objective</h2>
                        
                        <p class='objective'>" .$row['objective']."</p>
                    </div>
                    
                    
                    <div class='section-title'><h2>skill</h2>
                    
                        <p class='skill'>" .$row['skill']."</p>
                </div>
                
         
                
                
            </div>
                
        </div>";
        
          
    // End HTML output
    echo "</body>
        </html>";

        echo "
        <script src='jspdf.umd.min.js'></script>
        <script>
            // Function to generate PDF from HTML content
            function generatePDF() {
                var doc = new jsPDF();
                var resumeContent = document.querySelector('.resume').innerHTML;
                doc.setFontSize(12);
                doc.html(resumeContent, {
                    callback: function (doc) {
                        doc.save('resume.pdf');
                    }
                });
            }
    
            document.getElementById('downloadButton').addEventListener('click', function() {
                generatePDF();
            });
        </script>
        ";
    
    } else {
        // If no data is found
        echo "No data found in the database.";
    }

// Close database connection
mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class='box'>
            <h2>Select Color Theme:</h2>
            <form id='colorForm'>
                <label for='color'></label>
                <select id="color" name="color">
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                </select>
                <br><br>
                <input type='button' value='Apply Theme' onclick='applyTheme()'>
            </form>
          </div>
    </div>

    <script>
            function applyTheme() {
                var color = document.getElementById('color').value;
                if (color === "red") {
                window.location.href = "retrive1_1.php";
            } else if (color === "blue") {
                window.location.href = "retrive1_2.php";
            } else if (color === "green") {
                window.location.href = "retrive1_3.php";
            } else if (color === "yellow") {
                window.location.href = "retrive1_4.php";
            }
            }
          </script>
</body>
</html>
 