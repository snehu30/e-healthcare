<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dstyle.css">
    <title>E-Healthcare Home</title>
    <style>
        <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
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
    <h2>Upcoming Appointments</h2>
    <table >
        <tr>
            <th>Date</th>
            <th>Patient Name</th>
            <th>Time</th>
            <th>Reason</th>
            <th>Attend</th>
        </tr>
        <main>
        
        <form action="aphistory.php" method="POST">
            </form>
        <section class="thank-you">
            <a href="aphistoryd.php"><i>go to history</i></a>
        </section>
    </main>



<?php
// Connect to your PostgreSQL database
$host = "localhost";
$port = "5432";
$dbname = "patient";
$user = "postgres";
$password = "postgres";

// Create connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
session_start();// Query to retrieve appointment history of a specific patient
$doctor_id = $_SESSION['doctor_id'];

// Check connection
if(!$conn) {
    die("Connection failed");
}


// Fetch upcoming appointments
$current_date = date("Y-m-d");
$sql = "SELECT date,name,time,comments FROM appointment WHERE  date >= $1 AND  doctor_id=$2";
$params = array($current_date, $doctor_id);
$result = pg_query_params($conn, $sql, $params);
//$result=pg_query($conn,$sql)or die('Query failed:'.pg_last_error());

while ($row= pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['comments'] . "</td>";
   echo '<td><form action="2.html" method="post">';
   //echo '<input type="hidden" name="patient_id" value="' . $row[2] . '">';
   echo '<button type="submit" name="attend">Attend</button>';
   echo '</form></td>';
   echo '</tr>';
    echo "</tr>";
}
echo"</table>";

// Close the database connection
pg_close($conn);
?>

<footer>
        <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
    </footer>
</body>
</html>