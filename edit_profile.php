<?php
session_start(); // Start session

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
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
$email = $_SESSION['email'];
$query = "SELECT * FROM patient WHERE email = '$email'";
$result = pg_query($db, $query);
$user1 = pg_fetch_assoc($result);

// Handle form submission for updating profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['name'];
    $new_email = $_POST['email'];
    $new_mobile = $_POST['mobile_no'];
    $new_age = $_POST['age'];
    $new_height = $_POST['height'];
    $new_weight = $_POST['weight'];
    $new_password = $_POST['password'];

    // Update user information in the database
    $update_query = "UPDATE patient SET name = '$new_username', email = '$new_email', mobile_no='$new_mobile', age= '$new_age', height='$new_height', weight='$new_weight', password='$new_password' WHERE email = '$email'" ;
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
                <li><a href="pdashboard.php">Dashboard</a></li>
                <li><a href="pre.php">Prescription</a></li>
                <li><a href="appointments.html">Book Appointments</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
    </header>
    <h1>Edit Profile</h1>
    <form method="post">
        Username: <input type="text" name="name" value="<?php echo $user1['name']; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $user1['email']; ?>"><br><br>
        Mobile Number: <input type="text" name="mobile_no" value="<?php echo $user1['mobile_no']; ?>"><br><br>
        Age: <input type="text" name="age" value="<?php echo $user1['age']; ?>"><br><br>
        Height: <input type="text" name="height" value="<?php echo $user1['height']; ?>"><br><br>
        Weight: <input type="text" name="weight" value="<?php echo $user1['weight']; ?>"><br><br>
        Password: <input type="text" name="password" value="<?php echo $user1['password']; ?>"><br><br>
        <input type="submit" value="Update Profile"><br><br>
    </form>
    <a href="pdashboard.php">Back to Dashboard</a><br><br>
    <a href="logout.php">Logout</a>
    <footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
pg_close($db); // Close database connection
?>
