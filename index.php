<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <form action="login_check.php" method="POST">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <h5>
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();
                    echo $_SESSION['loginMessage'];
                    ?>
                </h5>
                <i class="fa fa-user" arial-hidden="true"></i>
                <input type="email" placeholder="Email" name="email" value="" required>
            </div>
            <br>
			<div class="textbox">
				<i class="fa fa-lock" arial-hidden="true"></i>
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
			<br><br>
			<input class="button" type="submit" name="login" value="Login">
        </div>
    </form>
</body>

</html>