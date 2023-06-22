<?php
session_start();
error_reporting(0);
$host="localhost";
$user="root";
$password="";
$db="tracking-system";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $sql="SELECT * FROM user WHERE email='".$email."' AND password='".$pass."' ";

    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="student"){

        $_SESSION['email']=$email;
        $_SESSION['usertype']="student";
        header("location:studenthome.php");
    }
    elseif($row["usertype"]=="admin"){
        $_SESSION['email']=$email;
        $_SESSION['usertype']="admin";
        header("location:adminhome.php");
    }

    else{
        
        $message="Invalid email or password";
        $_SESSION['loginMessage']=$message;
        header("location:index.php");
    }
}

?>