<?php
session_start();

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

// Check if the database connection was successful
if (!$data) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Prepare the statement to fetch the complaints
$query = "SELECT email, complaint FROM complaints";
$statement = mysqli_prepare($data, $query);

// Execute the statement and fetch the result
mysqli_stmt_execute($statement);
mysqli_stmt_bind_result($statement, $email, $complaints);

// Store the fetched complaints in an array
$complaintsArray = [];
while (mysqli_stmt_fetch($statement)) {
    $complaintsArray[] = [
        
        'email' => $email,
        'complaint' => $complaints
    ];
}

// Close the statement
mysqli_stmt_close($statement);

// Close the database connection
mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Complaints</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include "admin_sidebar.php"?>
    <div class="container">
        <h1>Student Complaints</h1>
        <table class="table">
            <thead>
                <tr>
                   
                    <!-- <th>Email</th> -->
                    <!-- <th>Complaint</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($complaintsArray as $complaint) : ?>
                    <tr>
                    
                        <!-- <td><?php echo $complaint['email']; ?></td> -->
                        <td><?php echo $complaint['complaint']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
