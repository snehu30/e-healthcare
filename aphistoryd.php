<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleshome.css">
    <title>Appointment History</title>
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
    <h1>Appointment History</h1>
    <table>
        <tr>
            <th>Date</th>
            <th>time</th>
            <th>Patient Name</th>
            <th>Reason</th>
        </tr>
        <?php
        // Connect to PostgreSQL database
        $dbconn = pg_connect("host=localhost dbname=patient user=postgres password=postgres")
            or die('Could not connect: ' . pg_last_error());
       

        session_start();// Query to retrieve appointment history of a specific patient
        $doctor_name=$_SESSION['doctor_name']; 
        $doctor_id = $_SESSION['doctor_id'];
               
    
        $query = "SELECT date, time, name, comments FROM appointment WHERE doctor_id = $1";
        
        // Execute query
        //$query = "SELECT * FROM appointment WHERE name = '$name'";
        $result = pg_query_params($dbconn, $query, array($doctor_id));
        // Loop through the result set and display appointment history in table rows
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['comments'] . "</td>";
            echo "</tr>";
    
        }

        // Free result set
        pg_free_result($result);
        
        // Close database connection
        pg_close($dbconn);
        ?>
    </table>
    <footer>
            <p>&copy; 2024 E-Healthcare. All rights reserved.</p>
        </footer>
</body>
</html>