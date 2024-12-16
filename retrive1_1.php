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
        
            width: 1000px;background-color: #fff;
            display: flex;
            justify-content: center;
            margin: 0 auto;
            border: 2px solid black;
            background-color: #fff;
            border-color: #8a8e94;
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
            background-color:red;
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
            color: white;
            background-color:red;
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

        select {
            height: 40px;
            width: 100%;
            font-size: 16px;
            border-radius: 20px;
            padding: 5px;
            margin-bottom: 20px;
            box-sizing: border-box; /* Ensure padding and border are included in the width and height */
            border: 1px solid #ccc; /* Add a border for better visibility */
        }
        
        input[type='button'] {
            height: 50px;
            width: 150px;
            border-radius: 25px;
            background-image: linear-gradient(to right, rgb(255, 195, 110), rgb(255, 146, 91));
            font-size: 20px;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        input[type='button']:hover {
            background-color: rgb(255, 140, 0);
        }
        
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .box {
            background-color: white;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 800px;
        }
        
        h2 {
            font-size: 24px;
          
            margin-bottom: 20px;
        }
        
        label {
            font-size: 18px;
            margin-bottom: 10px;
        }

        
    </style>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js'></script>
    
    
    </head>
    <body>

         <br>
    


        <div class='resume'>
            <div  class='row'>
                
    
            <img src='" . $row['profile_pic'] . "' class='img' alt='profile_pic'>
                    
                
                
                
                
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
    <!-- Include jsPDF library via link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

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
                <option value="golden">Golden</option>
            </select>
            <br><br>
            <input type='button' value='Apply Theme' onclick='applyTheme()'>
            <!-- Call downloadPDF function on button click -->
            <input type='button' value='Download as PDF' onclick="downloadPDF()">
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
        } else if (color === "golden") {
            window.location.href = "retrive1_4.php";
        }
    }
    console.log(window.jsPDF);
    function downloadPDF() {
    // Create a new jsPDF instance
    var doc = new jsPDF('p', 'mm', 'a4');

    // Get the HTML body element
    var body = document.getElementsByClassName("resume");

    // Get the current scroll position
    var scrollY = window.scrollY;

    // Scroll to the top of the page
    window.scrollTo(0, 0);

    // Take a screenshot of the viewport using html2canvas
    html2canvas(body, {
        onrendered: function(canvas) {
            // Convert canvas to JPEG image
            var imgData = canvas.toDataURL('image/jpeg', 1.0);

            // Add the image to the PDF
            doc.addImage(imgData, 'JPEG', 0, 0, 210, 297); // A4 size: width = 210mm, height = 297mm

            // Reset the scroll position
            window.scrollTo(0, scrollY);

            // Save the PDF
            doc.save('page.pdf');
        }
    });
}





    
</script>
</body>
</html>
