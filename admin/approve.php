<?php
$log=$_GET['id'];
include '../connection.php';
$query="UPDATE login SET login_status='1' WHERE login_id='$log'";
mysqli_query($conn,$query);

echo "<script>alert('Owner Approved');window.location='owner.php'; </script>";
?>