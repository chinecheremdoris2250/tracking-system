<?php
include 'db.php';
if (isset($_POST['add_student'])) {

    // $id = $_POST['id'];
    $username = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $reg_no = $_POST['reg'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $total = $_POST['total'];
    $village = $_POST['village'];
    $lga = $_POST['lga'];
    $state = $_POST['state'];
    $sponsor = $_POST['sponsor'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];
    $level = $_POST['level'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;
    $dst_db = "image/" . $file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    $usertype = "student";
    $user_id = rand(0000, 999999);

    $check = "SELECT * FROM user WHERE email='$email'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);
    if ($row_count == 1) {
        echo "<script type='text/javascript'>
        alert('Email already exist. Try Again');
         </script";

         
       
       
    } else {


        $sql = "INSERT INTO user(user_id,username,dob,email,usertype,password,reg_no,gender,phone,address,school,total,village,lga,state,sponsor,contact,avatar,description,level) VALUES ('$user_id','$username','$dob','$email','$usertype','$hashedPassword','$reg_no','$gender','$phone','$address','$school','$total','$village','$lga','$state','$sponsor','$contact','$dst_db','$description','$level')";
        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "<script type='text/javascript'>
        alert('Data Upload Success');
         </script";
            // header('location:add_student.php');
        } else {
            echo "Upload Failed";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href="add_student.css"> -->
    <!-- <link rel="stylesheet" href="dashboard.css"> -->
</head>

<!-- <body class="bg-dark text-white"> -->
<?php
include './admin_sidebar.php';
?>
<h2 class="text-center">ADD STUDENTS FORM</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <!-- <div class="form-group">

        <input type="text" class="form-control" id="inputAddress" placeholder="Student Id" name="id" required>
    </div> -->
    <div class="form-group">

        <input type="text" class="form-control" id="inputAddress" placeholder="Fullname" name="name" required>
    </div>
    <br>
    <div class="form-group">

        <input type="text" class="form-control" id="inputAddress" placeholder="Date of Birth" name="dob" required>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
            <br>
        </div>
        <div class="form-group col-md-6">

            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="reg" placeholder="REG-NO" name="reg" required>
            <br>
        </div>
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="gender" placeholder="Enter Your Gender" name="gender" required>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" required>
        </div>
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="School" placeholder="School Year" name="school" required>
        </div>
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="Total" placeholder="Total No of Years" name="total" required>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="inputCity">Hometown</label>
            <input type="text" class="form-control" id="inputCity" name="village">
        </div>
        <div class="form-group col-md-4">
            <label for="inputCity">Local Government of Origin</label>
            <input type="text" class="form-control" id="inputCity" name="lga">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="state" name="state">

        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="inputSponsor" placeholder="Parents/Guardian" name="sponsor" required>
            <br>
        </div>
        <div class="form-group col-md-6">

            <input type="text" class="form-control" id="inputContact" placeholder="Parents/Guardian Contact" name="contact" required>

        </div>
    </div>
    <br>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="avatar">Level</label>
            <input type="text" class="form-control" id="exampleFormControlFile1" name="level" required>
            <br>
        </div>
        <div class="form-group col-md-6">
            <br>
            <textarea name="description" style="width: 100%; height:100%;" placeholder="Student Description"></textarea>

            <!-- <textarea name="description" placeholder="Student Description"></textarea> -->
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label for="avatar">User Avatar</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
            <br>
        </div>


    </div>
    <br>
    <div class="row">
        <button type="submit" class="btn btn-primary" name="add_student">Add Student</button>
    </div>
    <br>
</form>
<!-- <div>
    <h3 class="form_div_h2">Add Student</h3>
</div>

<div class="form_div">

    <form>

        <input type="text" placeholder="Username">
        <input type="number" placeholder="Phone">
        <input type="email" placeholder="Email">
        <input type="Password" placeholder="Create Password">
        <input type="text" placeholder="REG-NO" name="reg" required>
        <input type="text" placeholder="Enter Address">
        <div class="form__control">
            <label for="avatar">User Avatar</label>
            <input type="file" id="avatar" >
        </div>
        <button type="submit" class="btn">Add Student</button>
        
    </form>
</div> -->


<script src="./dashboard.js"></script>
</body>

</html>