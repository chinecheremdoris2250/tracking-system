<?php

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

// Query to retrieve the recently added students
$query = "SELECT * FROM user WHERE usertype='student' ORDER BY school DESC LIMIT 10";

// Execute the query
$result = mysqli_query($data, $query);

// Check if the query was successful
if ($result) {
    // Check if there are any recently added students
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="report-container">';
        echo '<div class="report-header">';
        echo '<h1 class="recent-Articles" href="">Student List</h1>';
        echo '<button class="view">View All</button>';
        echo '</div>';

        echo '<div class="report-body">';
        echo '<div class="report-topic-heading">';
        echo '<h3 class="t-op">Username</h3>';
        echo '<h3 class="t-op">Reg No</h3>';
        echo '<h3 class="t-op">Year</h3>';
        echo '<h3 class="t-op">Status</h3>';
        echo '</div>';

        echo '<div class="items">';
        
        // Loop through the result set and display the recently added students
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            $regNo = $row['reg_no'];
            $year = $row['school'];
            $status = $row['description'];

            echo '<div class="item1">';
            echo "<h3 class='t-op-nextlvl'>$username</h3>";
            echo "<h3 class='t-op-nextlvl'>$regNo</h3>";
            echo "<h3 class='t-op-nextlvl'>$year</h3>";
            echo "<h3 class='t-op-nextlvl label-tag'>$status</h3>";
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "No recently added students.";
    }
} else {
    // Display an error message if the query fails
    echo "Failed to retrieve recently added students.";
}

// Close the database connection
mysqli_close($data);
?>
