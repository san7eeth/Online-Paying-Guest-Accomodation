<?php
session_start();
$log=$_SESSION['login_id'];
// $username=$_POST['username'];
$cus_password=$_POST['cus_password'];
$fname=$_POST['fname'];
$owner_address=$_POST['owner_address'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$id_proof=$_POST['id_proof'];
$owner_state=$_POST['owner_state'];
$district=$_POST['district'];
$city=$_POST['city'];


include 'connection.php';
$query="UPDATE login set email='$email', cus_password='$cus_password' WHERE login_id='$log' ";
mysqli_query($conn,$query);
$query="UPDATE owner SET fname='$fname',owner_address='$owner_address',email='$email',phno='$phno',id_proof='$id_proof',owner_state='$owner_state',district='$district',city='$city' WHERE login_id='$log'";
mysqli_query($conn,$query);
echo "<script>alert('Updation Successful');window.location='index.php'; </script>";
?>