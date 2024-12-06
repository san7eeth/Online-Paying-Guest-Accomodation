<?php
session_start();
$log=$_SESSION['login_id'];
$room_no=$_POST['room_no'];
$type=$_GET['type'];
$manage=$_GET['manage'];
$room_address=$_POST['room_address'];
$room_state=$_POST['room_state'];
$room_district=$_POST['room_district'];
$room_city=$_POST['room_city'];
$room_description=$_POST['room_description'];
$room_bed=$_POST['room_bed'];
$room_img=$_POST['room_img'];
$room_vid=$_POST['room_vid'];
$room_price=$_POST['room_price'];
$room_bathroom=$_POST['room_bathroom'];
$room_furnishing=$_POST['room_furnishing'];
$room_wifi=$_POST['room_wifi'];
$room_kitchen=$_POST['room_kitchen'];



include 'connection.php';
if($manage!='owner'){
    $manage_name=$_POST['manage_name'];
    $manage_no=$_POST['manage_no'];
}
elseif($manage!='other'){
    $sql="SELECT * FROM owner WHERE login_id='$log'";
    $val=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($val);
    $manage_name=$row['fname'];
    $manage_no=$row['phno'];
    
}
$query="INSERT into add_room(room_no,room_sell,manage,manage_name,manage_no,room_address,room_state,room_district,room_city,room_description,room_bed,room_bathroom,room_kitchen,room_furnishing,room_wifi,room_img,room_vid,room_price,room_owner) VALUES('$room_no','$type','$manage','$manage_name','$manage_no','$room_address','$room_state','$room_district','$room_city','$room_description','$room_bed','$room_bathroom','$room_kitchen','$room_furnishing','$room_wifi','$room_img','$room_vid','$room_price','$log')";
mysqli_query($conn,$query);
echo "<script>alert('Added Successfully');window.location='index.php'; </script>";
?>
