<?php
include "connection.php";
$id=$_GET['id'];


    $sql="UPDATE booking SET book_status='Booked with Online Payment' where book_id=$id";
mysqli_query($conn,$sql);
echo "<script>alert('Booked Successfully');window.location='index.php'; </script>";

?>