
<?php
error_reporting(0);
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
$sql = "SELECT * FROM user WHERE level = 'past' ORDER BY school ASC";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
           border: 3px solid black;
        }

        .table_th {
            padding: 10px;
            /* font-size: 20px; */
        }

        .table_td {
            padding: 10px;
        }

        #avatar {
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
            border: 0.3rem solid #0f0f3e;
            overflow: hidden;
        }
    </style>
</head>



<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,
                   initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="    https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="responsive.css">


<?php
include 'admin_sidebar.php';

?>
<?php
if ($_SESSION['message']) {
    echo $_SESSION['message'];
}
unset($_SESSION['message']);
?>




<div class="table-responsive text-center">
<h2 class="text-center">VIEW STUDENTS</h2>

    <!-- <h2 class="text-center">VIEW STUDENTS</h2> -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="table_th">Photos</th>

                <th class="table_th">Fullname</th>
                <th class="table_th">DOB</th>
                <th class="table_th">Email</th>
                <!-- <th class="table_th">Password</th> -->
                <th class="table_th">Reg-no</th>
                
                <th colspan="3" class="table_th">Actions</th>
                <!-- <th class="table_th">Update</th> -->
            </tr>
        </thead>

        <?php

        while ($info = $result->fetch_assoc()) {

            // echo $row['username'] . ' - ' . $row['level'] . ' - ' . $row['school'] . '<br>';


        ?>
            <tbody class="tbody tbody-bordered border-dark tbody-sm  tbody-striped tbody-dark">
                <tr>
                    <td class="table_td">
                        <img id="avatar" src="<?php echo "{$info['avatar']}"; ?>">
                    </td>
                    <td class="table_td"><?php echo "{$info['username']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['dob']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['email']}"; ?></td>
                    <!-- <td class="table_td"><?php echo "{$info['password']}"; ?></td> -->
                    <td class="table_td"><?php echo "{$info['reg_no']}"; ?></td>
                    
                    <td class="table_td"><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are you sure to Delete'); \" href='delete.php?student_id={$info['id']}'>Delete</a>"; ?></td>
                    <!-- <td class="table_td"><?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'> Update </a>" ?></td> -->
                    <td class="table_td"><?php echo"<a class='btn btn-info' href='pastview.php?id={$info['id']}'> View </a>" ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>

    <script src="./dashboard.js"></script>
    </body>

</html> ...
