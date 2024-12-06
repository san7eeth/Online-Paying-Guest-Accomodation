<?php
session_start();
$log=$_SESSION['login_id'];
$id=$_GET['id'];
$pg_name=$_POST['pg_name'];
$pg_address=$_POST['pg_address'];
$pg_state=$_POST['pg_state'];
$pg_district=$_POST['pg_district'];
$pg_city=$_POST['pg_city'];
$pg_description=$_POST['pg_description'];
$pg_bedroom=$_POST['pg_bedroom'];
$pg_bathroom=$_POST['pg_bathroom'];
$pg_kitchen=$_POST['pg_kitchen'];
$pg_furnishing=$_POST['pg_furnishing'];
$pg_parking=$_POST['pg_parking'];
$pg_wifi=$_POST['pg_wifi'];
$pg_img=$_POST['pg_img'];
$pg_vid=$_POST['pg_vid'];
$pg_price=$_POST['pg_price'];



include 'connection.php';
$query="UPDATE add_pg SET pg_name='$pg_name',pg_address='$pg_address',pg_state='$pg_state',pg_district='$pg_district',pg_city='$pg_city',pg_description='$pg_description',pg_img='$pg_img',pg_vid='$pg_vid',pg_price='$pg_price',
pg_bedroom='$pg_bedroom',pg_bathroom='$pg_bathroom',pg_kitchen='$pg_kitchen',pg_furnishing='$pg_furnishing',pg_parking='$pg_parking',pg_wifi='$pg_wifi' WHERE pg_id='$id' ";
mysqli_query($conn,$query);
echo "<script>alert('Added Successfully');window.location='index.php'; </script>";
?>

