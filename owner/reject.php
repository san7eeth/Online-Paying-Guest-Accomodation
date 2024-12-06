<?php
$log=$_GET['id'];
include '../connection.php';
$query="UPDATE booking SET book_status='Rejected' WHERE book_id='$log'";
mysqli_query($conn,$query);

echo "<script>alert('Booking Rejected');window.location='room_book.php'; </script>";
?>