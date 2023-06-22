<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location:index.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:index.php");
}

?>

<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['reg_no'])) {
    $reg_no = $_GET['reg_no'];

    $query = mysqli_query($data, "SELECT * FROM user WHERE reg_no = '$reg_no'");
    $row = mysqli_fetch_assoc($query);

    // Display the student details
    echo "Student Name: " . $row['username'] . "<br>";
    echo "Registration Number: " . $row['reg_no'] . "<br>";
    echo "Password: " . $row['password'] . "<br>";
}
?>


<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";

$data = mysqli_connect($host, $user, $password, $db);

// Check if the database connection was successful
if (!$data) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Prepare the statement to count the total number of complaints
$query = "SELECT COUNT(*) AS total_complaints FROM complaints";
$statement = mysqli_prepare($data, $query);

// Execute the statement and fetch the result
mysqli_stmt_execute($statement);
mysqli_stmt_bind_result($statement, $totalComplaints);
mysqli_stmt_fetch($statement);

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
    <meta name="viewport" content="width=device-width,
                   initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="responsive.css">
    <style>
        a {
            text-decoration: none;
            font-size: 17px;
        }

        button a {
            color: white;

        }
    </style>
</head>

<body>
    <header>

        <div class="logosec">
            <div class="logo">JOBITECH</div>
            <img src="img/menu-icon.png" class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>


        <div class="searchbar">
            <input type="text" placeholder="Search" name="search">
            <div class="searchbtn">
                <img src="img/search.png" class="icn srchicn" alt="search-icon">
            </div>
        </div>


        <div class="message">
            <div class="circle"></div>
            <img src="img/notification.png" class="icn" alt="">
            <div class="dp">
                <img src="img/avatar.png" class="dpicn" alt="dp">
            </div>
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">

                    <div class="nav-option option1">
                        <img src="img/article.png" class="nav-img" alt="dashboard">
                        <h5><a href="studenthome.php" style="color: white;">Dashboard</a></h5>
                    </div>



                    <div class="nav-option option2">
                        <img src="img/plus.png" class="nav-img" alt="institution">
                        <h5> <a href="view_student.php">Student Profile</a></h5>
                    </div>
                    <div class="nav-option option2">
                        <img src="img/plus.png" class="nav-img" alt="institution">
                        <h5> <a href="complain.php">Students Complaints</a></h5>
                    </div>
                    <div class="nav-option logout">
                        <img src="img/logout.png" class="nav-img" alt="signout">
                        <?php echo "<a href='logout.php' class='text-blue' style='background-none: blue; border: none;'>Logout</a>"; ?>
                    </div>

                </div>
            </nav>
        </div>
        <div class="searchbar2">
            <input type="text" name="" id="" placeholder="Search">
            <div class="searchbtn">
                <img src="img/search.png" class="icn srchicn" alt="search-button">
            </div>
        </div>
        <div class="main">

            <?php
            include 'animation.php';
            ?>
            <?php include 'updatelikes.php'; ?>

            <div class="box-container">

                <div class="box box1">
                    <div class="text">
                        <?php echo '<h2 class="topic-heading">' . $totalStudents . '</h2>'; ?>
                        <h2 class="topic">Total Students</h2>
                    </div>

                    <img src="img/eye.png" alt="Views">
                </div>

                <div class="box box2">
                    <div class="text">
                        <h2 class="topic-heading">150</h2>
                        <h2 class="topic">Likes</h2>
                    </div>

                    <img src="img/thumbs-up.png" alt="likes">
                </div>

                <div class="box box3" id="complainBox">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $totalComplaints; ?></h2>
                        <h2 class="topic">Comments</h2>
                    </div>
                    <img src="img/comment.png" alt="complains">
                </div>


            </div>


        </div>


        <script src="./dashboard.js"></script>
</body>

</html>
<!-- for header part -->