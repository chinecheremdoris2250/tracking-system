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

// Check if the user is logged in and is a student
if (!isset($_SESSION['email']) || $_SESSION['usertype'] != 'student') {
    header("location:index.php");
    exit;
}

// Prepare the statement
$query = "INSERT INTO complaints (username,complaint) VALUES (?, ?)";
$statement = mysqli_prepare($data, $query);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process the complaint data
    $complaint = $_POST['complaint'];
    $username = $_SESSION['username']; // Retrieve the username from the session
    // $email = $_SESSION['email']; // Retrieve the email from the session

    // Bind the parameters
    mysqli_stmt_bind_param($statement, "ss", $username, $complaint);

    // Execute the statement and check for errors
    if (mysqli_stmt_execute($statement)) {
        $_SESSION['message'] = "Complaint submitted successfully!";
        header("location: complain.php");
        exit;
    } else {
        echo "<script type='text/javascript'>
                alert('Failed to submit complaint');
              </script>";
    }
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
    <title>Student Complaint</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group textarea {
            height: 150px;
        }
    </style>
</head>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Complaint</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group textarea {
            height: 150px;
        }
    </style>
</head>

<body>
    <?php
    include 'student_sidebar.php';

    // Display success message if set
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>

    <div class="container">
        <h2>Submit a Complaint or Feedback</h2>
        <form method="POST">
        <div class="row">
        <div class="form-group col-md-6">

            <!-- <input type="text" class="form-control" id="username" placeholder="Usernamer" name="username"> -->
        </div>
        <div class="form-group col-md-6">

            <!-- <input type="text" class="form-control" id="email" placeholder="Email" name="email"> -->
        </div>
    </div>

    <br>
            <div class="form-group">
                <label for="complaint">Complaint or Feedback</label>
                <textarea class="form-control" id="complaint" name="complaint" rows="5" required></textarea>
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
           
        </form>
    </div>
    <script src="./dashboard.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>