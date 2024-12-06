<?php
// $username=$_POST['username'];
$cus_password=$_POST['cus_password'];
$fname=$_POST['fname'];
$phno=$_POST['phno'];
$aadhar=$_POST['aadhar'];
$email=$_POST['email'];
$gender=$_POST['gender'];

include 'connection.php';
$query="INSERT into login(email,cus_password,user_type,login_status) VALUES('$email','$cus_password','customer','1')";
mysqli_query($conn,$query);
$log=mysqli_insert_id($conn);
$query="INSERT into customer(fname,email,gender,phno,aadhar,login_id) VALUES('$fname','$email','$gender','$phno','$aadhar','$log')";
mysqli_query($conn,$query);
echo "<script>alert('Registration Successful');window.location='login.php'; </script>";
?>