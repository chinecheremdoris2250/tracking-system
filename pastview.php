

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php
include 'admin_sidebar.php';

$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";

$data = mysqli_connect($host, $user, $password, $db);

$studentId = isset($_GET['id']) ? $_GET['id'] : null;

// Retrieve the student details from the database based on the provided ID
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($data, $sql);
mysqli_stmt_bind_param($stmt, "i", $studentId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$info = mysqli_fetch_assoc($result);

// Display the student details
if ($info) {
    echo "<table class='table table-bordered table-sm'>
            <thead class='table-dark'>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Student Photo</td>
                    <td>{$info['avatar']}</td>
                </tr>
                <tr>
                    <td>Student ID</td>
                    <td>{$info['id']}</td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td>{$info['username']}</td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td>{$info['dob']}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{$info['email']}</td>
                </tr>
                <tr>
                    <td>Reg_No</td>
                    <td>{$info['reg_no']}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{$info['gender']}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{$info['phone']}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{$info['address']}</td>
                </tr>
                <tr>
                    <td>School</td>
                    <td>{$info['school']}</td>
                </tr>
                <tr>
                    <td>Years</td>
                    <td>{$info['total']}</td>
                </tr>
                <tr>
                    <td>Hometown</td>
                    <td>{$info['village']}</td>
                </tr>
                <tr>
                    <td>Local Government</td>
                    <td>{$info['lga']}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{$info['state']}</td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>{$info['level']}</td>
                </tr>
                <tr>
                    <td>Guardia Contact</td>
                    <td>{$info['contact']}</td>
                </tr>
                <tr>
                    <td>Parents/Guardian</td>
                    <td>{$info['sponsor']}</td>
                </tr>
            </tbody>
        </table>";
} 

echo "<div class='row text-center mt-3'>
        <a href='paststudents.php' class='btn btn-primary'>Cancel</a>
      </div>";
?>


</body>
</html>
