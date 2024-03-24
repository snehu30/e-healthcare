<?php
// Connect to the database and retrieve appointments
// Replace 'your_database', 'your_username', 'your_password', 'your_host' with your database details
$conn = pg_connect("dbname=patient user=postgres password=postgres host=localhost");

// Fetch appointments query
$query = "SELECT name, doctor_name, date,time,comments, status FROM appointment";
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
</head>
<body>

<h1>Appointments</h1>

<table border="1">
    <tr>
        <th>Patient Name</th>
        <th>Doctor Name</th>
        <th>Appointment Date</th>
        <th>Appointment time</th>
        <th>reason</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($row = pg_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['doctor_name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><?php echo $row['comments']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <?php if ($row['status'] == 'Pending'): ?>
                    <form action="update_status2.php" method="post">
                        <input type="hidden" name="name" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="accept">Accept</button>
                        <button type="submit" name="decline">Decline</button>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php
// Close the database connection
pg_close($conn);
?>