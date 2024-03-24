<?php
// Connect to the database
$conn = pg_connect("dbname=patient user=postgres password=postgres host=localhost");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = $_POST['name'];

    if (isset($_POST['accept'])) {
        $status = 'Accepted';
    } elseif (isset($_POST['decline'])) {
        $status = 'Declined';
    }

    // Update the status in the database
    $query = "UPDATE appointment SET status = $1 WHERE id = $2";
    $result = pg_query_params($conn, $query, array($status, $name));

    if ($result) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status.";
    }
}

// Close the database connection
pg_close($conn);
?>