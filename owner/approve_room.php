<?php
$log=$_GET['id'];
$id=$_GET['rid'];
include '../connection.php';
$query="UPDATE booking SET book_status='Approved' WHERE book_id='$log'";
mysqli_query($conn,$query);
$query2="UPDATE add_pg set pg_bedroom=pg_bedroom-1 WHERE pg_id ='$id'";
mysqli_query($conn,$query2);
echo "<script>alert('Booking Approved');window.location='index.php'; </script>";
?>