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
$query = "SELECT doctor_name FROM doctor";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$doctors = array();
while ($row = pg_fetch_assoc($result)) {
    $doctors[] = $row['doctor_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleshome.css">
    <title>Appointment Booking</title>
</head>
<body>

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

        <main>
            <section class="appointment-form">
                <h2>Appointment Booking</h2>
                <form action="appointment.php"  method="post"> 
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                    <br><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <br><br>
                    <label for="date">Preferred Date:</label>
                    <input type="date" id="date" name="date" required>
                    <br><br>
                    <label for="time">Preferred Time:</label>
                    <input type="time" id="time" name="time" required>
                    <br><br>
                    <label for="doctor_name">Doctor:</label>
                    <select id="doctor_name" name="doctor_name">
                    <option value="">Select Doctor</option>
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?php echo $doctor; ?>"><?php echo $doctor; ?></option>
                    <?php endforeach; ?>
                </select><br><br>

                    <label for="comments">Reason:</label>
                    <input type="text" name="comments"></textarea>
                    <br><br>
                    <input type="submit" value="Book Now">
                </form>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
        </footer>
        </body>
        </html>