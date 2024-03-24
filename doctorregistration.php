<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleshome.css">
    <title>E-Healthcare Registration</title>
    <style>
        /* Basic styling for demonstration purposes */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">E-Healthcare</div>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="Services.html">Services</a></li>
                <li><a href="doctorregistration.html">Doctor</a></li>
                <li><a href="admin.html">Admin login</a></li>
                <li><a href="contact.html">Contact us</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Registration for Doctors</h2>
        <form action="doctor.php" method="post">
            <div class="form-group">
                <label for="doctor-name">Name:</label>
                <input type="text" id="doctor_name" name="doctor_name" required>
            </div><br>
            <div class="form-group">
                <label for="doctor-experience">Years of Experience:</label>
                <input type="text" id="doctor-experience" name="doctor_experience" required>
            </div><br>
            <div class="form-group">
                <label for="doctor-specialization">Specialization:</label>
                <input type="text" id="doctor-specialization" name="doctor_specialization" required>
            </div><br>
            <div class="form-group">
                <label for="doctor-email">Email:</label>
                <input type="email" id="doctor-email" name="doctor_email" required>
            </div><br>
            <div class="form-group">
                <label for="doctor-password">Password:</label>
                <input type="password" id="doctor-password" name="doctor_password" required>
            </div><br>
            <input type="submit" value="Register as doctor">
        </form>
        <h5>Are you an Existing user?<a href="doctorlogin.php">Log In</a></h5>
    </div>
    <?php
    
    
    ?>
    <footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
</body>
</html>