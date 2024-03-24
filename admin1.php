<?php
// PostgreSQL database connection parameters
$dbhost = 'localhost';
$dbname = 'patient';
$dbuser = 'postgres';
$dbpass = 'postgres';

// Connect to PostgreSQL database
$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
if (!$conn) {
    echo "Failed to connect to PostgreSQL database.";
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the email and password exist in the database
    $query = "SELECT * FROM admin WHERE email = $1 AND password = $2";
    $result = pg_query_params($conn, $query, array($email, $password));

    // Check if any rows are returned
    if (pg_num_rows($result) > 0) {
        // Redirect to the next page if login is successful
        header("Location: admin2.html");
        exit;
    } else {
        // Display error message if login fails
        echo"<html><script>alert('Invalid Username or password');</script></html>";
    }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleshome.css">
    <title>E-Healthcare Log In</title>

   <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
    </style>

    </head>

    <body>

        <div class="container">
           
        <main>
            <form action="admin1.php" method="post">
            <section class="thank-you">
                <p class="centered-word"><h1>Log In</h1></p>
                <h4>Enter your Username</h4>
                <input type="text" id="id" name="email" required>
                <h4>Enter Password</h4>
                <input type="password" id="password" name="password" required>
                <br><br>
                
                <button class="btn">Login</button> 
                <br><br>
                <a href="homepage.html"><i>Back to Home</i></a>
            </section>
    
         </main>
        </div>
    
    <footer>
    <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
    </body>
    </html>

