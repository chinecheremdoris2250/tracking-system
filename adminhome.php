<?php
include 'search.php';
?>
<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location:index.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:index.php");
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

    <head>
        <!-- Other meta tags, title, and CSS styles -->

        <!-- Include jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    </head>

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
        .control {
            border: none;
            outline: none;
            box-shadow: none;
            background: transparent;
            color: blue;
        }

        a {
            text-decoration: none;
        }
    </style>

    <head>


    <body>
        <?php include 'updatelikes.php'; ?>

        <!-- for header part -->
        <header>

            <div class="logosec">
                <div class="logo">JOBITECH</div>
                <img src="img/menu-icon.png" class="icn menuicn" id="menuicn" alt="menu-icon">
            </div>


            <div class="searchbar">
                <input type="text" placeholder="Search">
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
                            <h5><a href="adminhome.php" style="color: white;">Dashboard</a></h5>
                        </div>



                        <div class="nav-option option4">
                            <img src="img/plus.png" class="nav-img" alt="institution">
                            <h5> <a href="add_student.php">Add Student</a></h5>
                        </div>

                        <div class="nav-option option3">

                            <img src="img/home.png" class="nav-img" alt="report">
                            <!-- <h5> <a href="view_student.php">View Student</a></h5>
                     -->
                            <select onchange="window.location.href = this.value;" class="control">
                                <option value="">View Students</option>
                                <option value="firstyear.php">100 Level</option>
                                <option value="secondyear.php">200 Level</option>
                                <option value="paststudents.php">Past Students</option>
                            </select> -->
                        </div>
                        <div class="nav-option option4">
                            <img src="img/plus.png" class="nav-img" alt="institution">
                            <h5> <a href="showcomplaint.php">View Complaints</a></h5>
                        </div>


                        <div class="nav-option logout">
                            <img src="img/logout.png" class="nav-img" alt="signout">
                            <?php echo "<a href='logout.php' class='text-blue' style='background-none: blue; border: none;'>Logout</a>"; ?>
                        </div>

                    </div>
                </nav>
            </div>
            <div class="main">
                <div class="searchbar2">
                    <form method="GET" action="search.php">
                        <input type="text" name="search" placeholder="Search">
                        <div class="searchbtn">
                            <button type="submit"><img src="img/search.png" class="icn srchicn" alt="search-button"></button>
                        </div>
                    </form>
                </div>


                <div class="box-container">

                    <div class="box box1">
                        <div class="text">
                            <?php echo '<h2 class="topic-heading">' . $totalStudents . '</h2>'; ?>
                            <h2 class="topic">Total Students</h2>
                        </div>

                        <img src="img/eye.png" alt="Views">
                    </div>
                    <!-- Modal Container for Complaint Details -->
                    <div id="modalContainer" class="modal-container">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <!-- Complaint Details will be displayed here -->
                        </div>
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
                            <h2 class="topic">Complaints</h2>
                        </div>
                        <img src="img/comment.png" alt="complains">
                    </div>


                </div>





                <?php include 'recent.php'; ?>

            </div>
        </div>

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                // Attach a click event listener to the complainBox
                $('#complainBox').on('click', function() {
                    // Make an AJAX request to fetch the complaint data
                    $.ajax({
                        url: 'fetch_complaints.php', // Update the URL to the PHP file that fetches the data
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // Process the response data
                            var complaints = response.complaints;

                            // Generate the HTML content to display the complaint details
                            var html = '<div class="complaint-details">';
                            html += '<h3>Complaints:</h3>';
                            html += '<ul>';
                            for (var i = 0; i < complaints.length; i++) {
                                var email = complaints[i].email;
                                var complaint = complaints[i].complaint;
                                html += '<li><strong>Email:</strong> ' + email + ', <strong>Complaint:</strong> ' + complaint + '</li>';
                            }
                            html += '</ul>';
                            html += '</div>';

                            // Display the complaint details in a modal or any other container on the page
                            // Replace '#modalContainer' with the ID or selector of the container where you want to display the details
                            $('#modalContainer').html(html);

                            // Open the modal or show the container with the complaint details
                            // Replace 'modalID' with the ID of your modal or any other method to display the content
                            $('#modalID').modal('show');
                        },
                        error: function(xhr, status, error) {
                            // Handle the error if the AJAX request fails
                            console.log(error);
                        }
                    });
                });
            });
        </script>

        <script src="./dashboard.js"></script>
        <!-- jQuery library -->


    </body>

</html>