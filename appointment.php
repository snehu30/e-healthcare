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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor=$_POST['doctor_name'];
    $comments = $_POST['comments'];
    // Prepare SQL statement
    $query = "INSERT INTO appointment(name, email, date,time,d_name,comments)values($1, $2, $3, $4, $5,$6)";
    $query1="UPDATE appointment AS a
SET doctor_id = d.doctor_id
FROM doctor AS d
WHERE a.d_name = d.doctor_name";
    session_start();
    $_SESSION['email']=$email;
    $_SESSION['doctor_name']=$doctor;
   
   
    // Execute SQL statement
    $result = pg_query_params($db,$query,array($name, $email, $date, $time,$doctor, $comments));
    $result1 = pg_query($db, $query1);
}
pg_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleshome.css">
    <title>Thank You!</title>
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
        
        <form action="aphistory.php" method="POST">
            </form>
        <section class="thank-you">
            <h2>Thank You!</h2>
            <p>Your appointment has been confirmed.</p>
            <a href="1.html"><i>Connect via video call</i></a><br><br>
            <p>For any further inquiries, please contact us at <a href="mail to:info@example.com">info@example.com</a>.</p>
            <a href="pdashboard.php"><i>Back to dashboard</i></a><br><br>
            <a href="aphistory.php"><i>go to history</i></a>
            <a href="aphistoryd.php"><i>go to history</i></a>
        </section>

</main>

<footer>
<p>&copy; 2024 E-Healthcare. All rights reserved.</p>
</footer>
</body>
</html>
