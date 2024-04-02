<?php 
session_start();
include("db.php");



require_once('TCPDF-main/tcpdf.php'); // Include TCPDF library

// Function to generate PDF from HTML content
function generatePDF($html, $filename) {
    // Create new PDF instance
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Your Resume');
    $pdf->SetSubject('Resume');
    $pdf->SetKeywords('Resume, PDF');
    
    // Set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
    // Set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    
    // Remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    // Add a page
    $pdf->AddPage();
    
    // Write the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // Close and output PDF
    $pdf->Output($filename, 'D');
}



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
    
    
    </head>
    <body>

    <div class='downld'>

    <form action='' method='post'>
                <input type='hidden' name='resume_html' value='" . htmlentities($html) . "'>
                <button type='submit' name='download' class='downlo'>Download</button>
            </form>

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

        if (isset($_POST['download'])) {
            // Generate PDF from HTML content and download
            generatePDF($_POST['resume_html'], 'your_resume.pdf');
        }
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
    
</body>
</html>