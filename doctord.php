<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleshome.css">
    <title>Doctor data</title>
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
                    <li><a href="admin2.html">Dashboard</a></li>
                    <li><a href="patientd.php">Patient</a></li>
                    <li><a href="doctord.php">Doctor</a></li>
                    <li><a href="appointmentsd.html">Appointments</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </nav>
            </header>
    <h1>Doctor Data</h1>
    <table>
        <tr>
           <th>Name</th>
           <th>Experience</th>
           <th>Specialization</th>
           <th>Email</th>
           <th>Password</th>
           
        </tr>
        <?php
        // Connect to PostgreSQL database
        $dbconn = pg_connect("host=localhost dbname=patient user=postgres password=postgres")
            or die('Could not connect: ' . pg_last_error());

      
        $query = "SELECT * FROM doctor";
        // Execute query
        //$query = "SELECT * FROM appointment WHERE name = '$name'";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());

        // Loop through the result set and display appointment history in table rows
        while ($row = pg_fetch_row($result)) {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[4] . "</td>";

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