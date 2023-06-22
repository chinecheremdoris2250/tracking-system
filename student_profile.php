<?php
include 'search.php';
?>
<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location:index.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Document</title>
    <style>
        
        .content{
            /* position: relative; */
            /* margin-top: -30rem; */
            margin: -30rem 5rem 5rem 15rem;
        }
    </style>
</head>

<body>
    <?php
    include 'search.php';
    // include 'student_sidebar.php';
    ?>

    <div class="content">

        <h2 class="text-center">UPDATE STUDENT PROFILE</h2>
        <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10">
            <form action="" method="POST" enctype="multipart/form-data">
        
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
                        <textarea name="description" placeholder="Student Description"></textarea>
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
        </div>
         <div>
    


        <script src="./dashboard.js"></script>
</body>

</html>