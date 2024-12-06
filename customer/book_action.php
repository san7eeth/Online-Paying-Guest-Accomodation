<?php
session_start();
$log=$_SESSION['login_id'];
$id=$_GET['id'];
$type=$_GET['type'];
$join=$_POST['join_date'];
$stay=$_POST['stay'];
$stay1="+ $stay month";
$calc=date('Y-m-d',strtotime($stay1,strtotime($join)));


include "connection.php";

$sql="INSERT INTO booking (room_id,cus_id,join_date,due_date,type,stay,book_status) VALUES ('$id','$log','$join','$calc','$type','$stay','pending')";
mysqli_query($conn,$sql);
echo "<script>alert('Booking Successful');window.location='index.php'; </script>";
?>