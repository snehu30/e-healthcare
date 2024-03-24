<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p_style.css">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            width: 80%;
            margin: 50px auto;
        }
        .profile-item {
            margin-bottom: 20px;
        }
        .profile-label {
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<header>
        <nav>
            <div class="logo">E-Healthcare</div>
            <ul>
            <li><a href="doctor.php">Dashboard</a></li>
                <li><a href="prescribe.html">Prescribe</a></li>
                <li><a href="upappointment.php">Upcoming Appointments</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>
    <div class="profile-container">
        <h2>My Profile</h2>
        <?php
        $host = 'localhost';
        $port = '5432';
        $dbname = 'patient';
        $user = 'postgres';
        $password = 'postgres';
        
        // Connect to PostgreSQL database
        $db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        
        if (!$db) {
            die("Error in connection: " . pg_last_error());
        }
        session_start();// Query to retrieve appointment history of a specific patient
        $doctor_name=$_SESSION['doctor_name']; 
           
        // Fetch user details from the database
        $query = "SELECT * FROM doctor WHERE doctor_name = '$doctor_name'"; // Assuming $user_id is available
        $result = pg_query($db, $query);
        $user1 = pg_fetch_assoc($result);

        // Display user details
        if ($user1) {
            echo '<div class="profile-item">';
            echo '<span class="profile-label">Username:</span>';
            echo '<span>' . $user1['doctor_name'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Experience:</span>';
            echo '<span>' . $user1['experience'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Specialization:</span>';
            echo '<span>' . $user1['specialization'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Email:</span>';
            echo '<span>' . $user1['email'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Password:</span>';
            echo '<span>' . $user1['password'] . '</span>';
            echo '</div>';

            // Add more profile attributes as needed
        } else {
            echo '<p>User not found.</p>';
        }

        // Close database connection
        pg_close($db);
        ?>
            <a href="edit_profile2.php">Edit Profile</a><br><br>
            <a href="logout.php">Logout</a>
    </div>

</body>
</html>