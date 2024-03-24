<?php
// PostgreSQL database connection parameters
$dbhost = 'localhost';
$dbname = 'patient';
$dbuser = 'postgres';
$dbpass = 'postgres';

// Connect to PostgreSQL database
$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
if (!$conn) {
    echo "Failed to connect to PostgreSQL database.";
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert data into the users table
    $query = "INSERT INTO users (username, email, password) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, array($username, $email, $password));

    if ($result) {
        echo "Registration successful. Welcome, $username!";
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username"><br><br>
        Email: <input type="email" name="email"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>