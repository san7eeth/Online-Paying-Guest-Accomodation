<?php
session_start();
$log=$_SESSION['login_id'];
// $username=$_POST['username'];
$cus_password=$_POST['cus_password'];
$fname=$_POST['fname'];
$phno=$_POST['phno'];
$aadhar=$_POST['aadhar'];
$email=$_POST['email'];
$gender=$_POST['gender'];

include 'connection.php';
$query="UPDATE login SET email='$email', cus_password='$cus_password' WHERE login_id='$log' ";
mysqli_query($conn,$query);
$query="UPDATE customer SET fname='$fname',email='$email',phno='$phno',aadhar='$aadhar',gender='$gender' WHERE login_id='$log' ";
mysqli_query($conn,$query);
echo "<script>alert('Updation Successful');window.location='index.php';</script>";
?>
