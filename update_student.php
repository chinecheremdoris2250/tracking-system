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

$id = $_GET['student_id'];
$sql = "SELECT * FROM user WHERE id='$id' ";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    // $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reg_no = $_POST['reg'];
    $address = $_POST['address'];
    $level = $_POST['level'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    $user_id = rand(0000, 999999);

    $student_id = $_POST['name'];

    // Update the student's level to 200
    $update_query = "UPDATE user SET level = '200' WHERE id = ?";

    $stmt = $data->prepare($update_query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();

    $query = "UPDATE user SET user_id=?, reg_no=?, username=?, level=?, phone=?, email=?, password=?, address=?, avatar=? WHERE id=?";
    $stmt = $data->prepare($query);
    $stmt->bind_param("issssssssi", $user_id, $reg_no, $name, $level, $phone, $email, $password, $address, $dst_db, $id);
    $stmt->execute();

    $result2 = $stmt->get_result();

    // if ($result2) {
    //     header("location:firstyear.php");
    //     exit;
        if ($result2) {
            mysqli_close($data);
            header("Location: firstyear.php");
            exit;
        }
  
}
// Check if the update form is submitted

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #avatar {
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
            border: 0.3rem solid #0f0f3e;
            overflow: hidden;
        }
    </style>
</head>
<!-- <body class="bg-dark text-white"> -->

<?php
include 'admin_sidebar.php';
?>

<h2 class="text-center">UPDATE STUDENT DATA</h2>



<form action="" method="POST" enctype="multipart/form-data">
    <!-- <div class="form-group">

        <input type="text" class="form-control" placeholder="ID" name="id" value="<?php echo "{$info['username']}"; ?>" required>
    </div> -->
    <div class="form-group">

        <input type="text" class="form-control" placeholder="Fullname" name="name" value="<?php echo "{$info['username']}"; ?>" required>
    </div>
    <br>
    <div class="form-group">

        <input type="text" class="form-control" id="inputAddress" placeholder="Date of Birth" name="dob" value="<?php echo "{$info['dob']}"; ?>" required>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?php echo "{$info['email']}"; ?>" required>
        </div>
        <div class="form-group col-md-6">

            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" value="<?php echo "{$info['password']}"; ?>" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="reg" placeholder="REG-NO" name="reg" value="<?php echo "{$info['reg_no']}"; ?>" required>
        </div>
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="gender" placeholder="Enter Your Gender" name="gender" value="<?php echo "{$info['gender']}"; ?>" required>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="<?php echo "{$info['phone']}"; ?>" required>
        </div>
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php echo "{$info['address']}"; ?>" required>
        </div>
    </div>

    <br>

    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="inputSponsor" placeholder="Parents/Guardian" name="sponsor" value="<?php echo "{$info['sponsor']}"; ?>" required>
        </div>
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="inputContact" placeholder="Parents/Guardian Contact" name="contact" value="<?php echo "{$info['contact']}"; ?>" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="avatar">User Avatar</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">

        </div>
        <br>
        <div class="row">
            <br>
            <div class="form-group col-md-6">
                <br>
                <label for="avatar">Level</label>
                <input type="text" class="form-control" id="exampleFormControlFile1" name="level" value="200" required>
                <br>
            </div>
            <div class="form-group col-md-6">

                <textarea name="description" placeholder="Student Description" value="<?php echo "{$info['description']}"; ?>"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-info" name="update">Update</button>
    </div>
</form>


<script src="./dashboard.js"></script>
</body>

</html>