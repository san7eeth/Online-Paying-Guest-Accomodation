<?php
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
$query="INSERT into login(email,cus_password,user_type,login_status) VALUES('$email','$cus_password','owner','0')";
mysqli_query($conn,$query);
$log=mysqli_insert_id($conn);
$query="INSERT into owner(fname,owner_address,email,phno,id_proof,owner_state,district,city,login_id) VALUES('$fname','$owner_address','$email','$phno','$id_proof','$owner_state','$district','$city','$log')";
mysqli_query($conn,$query);
echo "<script>alert('Registration Successful');window.location='login.php'; </script>";
?>