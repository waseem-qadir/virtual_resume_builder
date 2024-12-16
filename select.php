<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection</title>
    <link rel="stylesheet" href="select.css">
</head>
<body>
<div class="container">
        <div class="box">
    <h2>Select Your Role:</h2>
    <form id="roleForm">
        <label for="role"></label>
        <select id="role" name="role">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
            <option value="professional">Professional</option>
        </select>
        <br><br>
        <input type="button" value="Submit" onclick="redirectToPage()">
    </form>
</div>
</div>

    <script>
        function redirectToPage() {
            var role = document.getElementById("role").value;
            if (role === "student") {
                window.location.href = "dash.php";
            } else if (role === "teacher") {
                window.location.href = "dash2.php";
            } else if (role === "professional") {
                window.location.href = "dash3.php";
            }
        }
    </script>
</body>
</html>
