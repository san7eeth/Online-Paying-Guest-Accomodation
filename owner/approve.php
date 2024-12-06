<?php
$log=$_GET['id'];
include '../connection.php';
$query="UPDATE booking SET book_status='Approved' WHERE book_id='$log'";
mysqli_query($conn,$query);
echo "<script>alert('Booking Approved');window.location='index.php'; </script>";
?>