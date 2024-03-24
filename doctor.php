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
    $doctor_name = $_POST['doctor_name'];
    $exp = $_POST['doctor_experience'];
    $special =$_POST['doctor_specialization'];
    $email = $_POST['doctor_email'];
    $password = $_POST['doctor_password'];

    session_start();
    $_SESSION['doctor_name']=$doctor_name;
    
    // Prepare SQL statement
    $query = "INSERT INTO doctor (doctor_name,experience,specialization, email, password) VALUES ($1, $2, $3, $4, $5)";

    // Execute SQL statement
    $result = pg_query_params($db,$query,array($doctor_name,$exp,$special,$email,$password ));

    if ($result) {
        echo "Data inserted successfully.";
    } else {
        echo "Error in inserting data.";
    }
}
pg_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dstyle.css">
    <title>E-Healthcare Home</title>
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

    <main>
        <div class="dashboard-container">
            <div class="option">
                <img src="https://cdn.iconscout.com/icon/free/png-256/free-profile-3352424-2791060.png" alt="Profile Picture" class="profile-picture">
                <div class="profile_name"><a href="pro.php">My Profile</a></div>
            </div>
             <div class="option">
                <img src="https://cdn-icons-png.freepik.com/512/9188/9188983.png" alt="Upcoming Appointments" class="profile-picture">
                 <div class="profile_name"><a href="upappointment.php">Upcoming Appointments</a></div>
             </div>
             <div class="option">
                <img src="https://cdn-icons-png.freepik.com/512/3774/3774493.png" alt="Appointment History" class="profile-picture">
                 <div class="profile_name"><a href="aphistoryd.php">Appointment History</a></div>
             </div>
            </div>
    </main>

    <footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
</body>
</html>
