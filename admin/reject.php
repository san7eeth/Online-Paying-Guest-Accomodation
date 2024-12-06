<?php
$log=$_GET['id'];
include '../connection.php';
$query="UPDATE login SET login_status='0' WHERE login_id='$log'";
mysqli_query($conn,$query);

echo "<script>alert('Owner Rejected');window.location='owner.php'; </script>";
?>