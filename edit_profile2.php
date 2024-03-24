<?php
session_start(); // Start session

// Check if the user is logged in
if (!isset($_SESSION['doctor_name'])) {
    header("Location: doctorlogin.php"); // Redirect to login page if not logged in
    exit;
}

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
//include("db_connection.php"); // Include database connection

// Fetch user data from the database
$doctor_name = $_SESSION['doctor_name'];
$query = "SELECT * FROM doctor WHERE doctor_name = '$doctor_name'";
$result = pg_query($db, $query);
$user1 = pg_fetch_assoc($result);

// Handle form submission for updating profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $_POST['doctor_name'];
    $new_email = $_POST['doctor_email'];
    $new_yearofexp = $_POST['doctor_experience'];
    $new_specialization= $_POST['doctor_specialization'];
    $new_password = $_POST['doctor_password'];

    // Update user information in the database
    $update_query = "UPDATE doctor SET doctor_name = '$new_name',experience='$new_yearofexp',specialization='$new_specialization' email = '$new_email', password='$new_password' WHERE doctor_name = '$doctor_name'" ;
    $update_result = pg_query($db, $update_query);


}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="p_style.css">
    <title>Edit Profile</title>
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
    <h1>Edit Profile</h1>
    <form method="post">
        Name: <input type="text" name="name" value="<?php echo $user1['doctor_name']; ?>"><br><br>
        Year of experience: <input type="text" name="email" value="<?php echo $user1['experience']; ?>"><br><br>
        Specialization: <input type="text" name="mobile_no" value="<?php echo $user1['specialization']; ?>"><br><br>
        Email: <input type="text" name="age" value="<?php echo $user1['email']; ?>"><br><br>
        Password: <input type="text" name="height" value="<?php echo $user1['password']; ?>"><br><br>
        <input type="submit" value="Update Profile"><br><br>
    </form>
    <a href="doctor.php">Back to Dashboard</a><br><br>
    <a href="logout.php">Logout</a>
    <footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
pg_close($db); // Close database connection
?>
