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
    $name = $_POST['patient_name'];
    $email = $_POST['email'];
    $symptoms = $_POST['symptoms'];
    $medication = $_POST['medication'];
 
    
    
    // Prepare SQL statement
    $query = "INSERT INTO prescribe(patient_name, email, symptoms, medication)values($1, $2, $3, $4)";
    // Execute SQL statem;nt
    $result = pg_query_params($db,$query,array($name, $email, $symptoms, $medication));

    session_start();
    $_SESSION['email']=$email;
   
}
pg_close($db);
?>
<html>
<link rel="stylesheet" href="dstyle.css">
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
        <h3>Prescription sent successfully</h3>
        <a href="doctor.php">Back to dashboard</a>
        <footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
    </body>

</html>
