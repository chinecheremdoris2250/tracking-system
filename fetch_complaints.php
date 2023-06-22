<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";

$data = mysqli_connect($host, $user, $password, $db);

// Check if the database connection was successful
if (!$data) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Prepare the statement to fetch the complaint details
$query = "SELECT email, complaint FROM complaints";
$statement = mysqli_prepare($data, $query);

// Execute the statement and bind the result
mysqli_stmt_execute($statement);
mysqli_stmt_bind_result($statement, $email, $complaint);

// Fetch all the complaint details into an array
$complaints = array();
while (mysqli_stmt_fetch($statement)) {
    $complaints[] = array(
        'email' => $email,
        'complaint' => $complaint
    );
}

// Close the statement
mysqli_stmt_close($statement);

// Close the database connection
mysqli_close($data);

// Return the complaint details as JSON response
header('Content-Type: application/json');
echo json_encode(array('complaints' => $complaints));
?>
