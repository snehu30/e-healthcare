<?php
// PostgreSQL database connection parameters
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $blood = $_POST['blood-group'];
    $phone = $_POST['contactinfo'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $symptoms = $_POST['myText'];
    $medical = $_POST['select0'];
    $pastsurg = $_POST['select1'];
    $smoke = $_POST['select2'];
    $stress = $_POST['select3'];
    $newmed = $_POST['select4'];
    
    
    // Prepare SQL statement
    $query = "INSERT INTO patient (name, email, password, gender,blood_group, mobile_no, dob, age, height, weight, symptoms, pre_existing, surgeries, smoke ,stressed, new_medications)values($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15,$16 )";

    // Execute SQL statement
    $result = pg_query_params($db,$query,array($name, $email, $password, $gender, $blood, $phone, $dob, $age, $height, $weight, $symptoms, $medical, $pastsurg, $smoke, $stress, $newmed));
   
}
pg_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p_style.css">
    <title>E-Healthcare Home</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">E-Healthcare</div>
            <ul>
                <li><a href="pdashboard.php">Dashboard</a></li>
                <li><a href="pre.html">Prescription</a></li>
                <li><a href="appointments.html">Book Appointments</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="dashboard-container">
            <div class="option">
                <img src="https://cdn.iconscout.com/icon/free/png-256/free-profile-3352424-2791060.png" alt="Profile Picture" class="profile-picture">
                <div class="profile_name"><a href="pprofile.html">My Profile</a></div>
            </div>
             <div class="option">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/003/501/833/small/calendar-icon-concept-of-schedule-appointment-free-vector.jpg" alt="Book Appointments" class="profile-picture">
                 <div class="profile_name"><a href="appointments.html">Book Appointments</a></div>
             </div>
             <div class="option">
                <img src="https://cdn4.iconfinder.com/data/icons/files-time-solid-style/24/time-view-512.png" alt="View History" class="profile-picture">
                 <div class="profile_name"><a href="aphistory.php">Appointment History</a></div>
             </div>
            </div>
    </main>

    <footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
</body>
</html