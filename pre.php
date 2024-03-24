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
                    <li><a href="pdashboard.php">Dashboard</a></li>
                    <li><a href="pre.php">Prescription</a></li>
                    <li><a href="appointments.php">Book Appointments</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </nav>
            </header>
    <h1>Appointment History</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Symptoms</th>
            <th>Medication</th>
        </tr>
        <?php
        // Connect to PostgreSQL database
        $dbconn = pg_connect("host=localhost dbname=patient user=postgres password=postgres")
            or die('Could not connect: ' . pg_last_error());

        session_start();// Query to retrieve appointment history of a specific patient
        $email=$_SESSION['email']; 
    
       
        $query = "SELECT patient_name, symptoms, medication FROM prescribe WHERE email = '$email'";
        // Execute query
        //$query = "SELECT * FROM appointment WHERE name = '$name'";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        // Loop through the result set and display appointment history in table rows
        while ($row = pg_fetch_row($result)) {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
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