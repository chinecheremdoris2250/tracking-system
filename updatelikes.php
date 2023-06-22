<?php
error_reporting(0);

if (!isset($_SESSION['email'])) {
    header("location:index.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:index.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";

$data = mysqli_connect($host, $user, $password, $db);
// Assuming you have a MySQL database connection established

// Query to retrieve the total number of students
$query = "SELECT COUNT(*) as total_students FROM user WHERE usertype='student'";

// Execute the query
$result = mysqli_query($data, $query);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Retrieve the total number of students
    $totalStudents = $row['total_students'];

    // Display the total number of students
    // echo "Total number of students: " . $totalStudents;
} else {
    // Display an error message if the query fails
    echo "Failed to retrieve the total number of students.";
}

// Close the database connection
mysqli_close($data);
?>