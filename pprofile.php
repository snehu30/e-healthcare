<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p_style.css">
    <title>User Profile</title>
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
                <li><a href="pdashboard.php">Dashboard</a></li>
                <li><a href="pre.php">Prescription</a></li>
                <li><a href="appointments.php">Book Appointments</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>
    <div class="profile-container">
        <h2>User Profile</h2>
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
        session_start();
        $email = $_SESSION['email'];
        // Fetch user details from the database
        $query = "SELECT * FROM patient WHERE email = '$email'"; // Assuming $user_id is available
        $result = pg_query($db, $query);
        $user1 = pg_fetch_assoc($result);

        // Display user details
        if ($user1) {
            echo '<div class="profile-item">';
            echo '<span class="profile-label">Username:</span>';
            echo '<span>' . $user1['name'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Email:</span>';
            echo '<span>' . $user1['email'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Password:</span>';
            echo '<span>' . $user1['password'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Gender:</span>';
            echo '<span>' . $user1['gender'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Blood Group:</span>';
            echo '<span>' . $user1['blood_group'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Mobile Number:</span>';
            echo '<span>' . $user1['mobile_no'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Date Of Birth:</span>';
            echo '<span>' . $user1['dob'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Age:</span>';
            echo '<span>' . $user1['age'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Height:</span>';
            echo '<span>' . $user1['height'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Weight:</span>';
            echo '<span>' . $user1['weight'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Symptoms:</span>';
            echo '<span>' . $user1['symptoms'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Pre existing Condition:</span>';
            echo '<span>' . $user1['pre_existing'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">Surgeries:</span>';
            echo '<span>' . $user1['surgeries'] . '</span>';
            echo '</div>';

            echo '<div class="profile-item">';
            echo '<span class="profile-label">New Medications:</span>';
            echo '<span>' . $user1['new_medications'] . '</span>';
            echo '</div>';
            

            // Add more profile attributes as needed
        } else {
            echo '<p>User not found.</p>';
        }

        // Close database connection
        pg_close($db);
        ?>
        
            <a href="edit_profile.php">Edit Profile</a><br><br>
            <a href="logout.php">Logout</a>
    </div>

</body>
</html>