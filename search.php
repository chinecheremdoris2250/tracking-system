

<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    $searchq = $_GET['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
    $query = mysqli_query($data, "SELECT * FROM user WHERE username LIKE '%$searchq%' OR reg_no LIKE '%$searchq%'") or die("Could not search!");
    $count = mysqli_num_rows($query);

    if ($count == 0) {
        echo "<script>alert('Student not found');</script>";
    } else {
        $row = mysqli_fetch_assoc($query);
        $user = $row['username'];
        $reg_no = $row['reg_no'];
        $password = $row['password'];

        // Redirect to the student details page
        header("Location: studenthome.php?reg_no=$reg_no");
        exit();
    }
}
?>
