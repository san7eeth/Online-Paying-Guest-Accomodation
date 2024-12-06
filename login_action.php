<?php
 include 'connection.php';
 session_start();
  
   $email=$_POST['email'];
   $pass=$_POST['cus_password'];

   $sql="SELECT * FROM login WHERE email='$email' and cus_password='$pass'";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result))
   {
    $row=mysqli_fetch_assoc($result);
    $_SESSION['login_id']=$row['login_id'];
    $_SESSION['user_type']=$row['user_type'];
    $_SESSION['email']=$row['email'];
    if($row['login_status']=='1')
        {
         if($row['user_type']=='admin')
        {
            header("location:admin/index.php");
        }
        elseif($row['user_type']=='owner')
        {
            header("location:owner/index.php");
        }
        elseif($row['user_type']=='customer')
        {
            header("location:customer/index.php");
        }
        else{
            echo "<script>alert('check your email or password');window.location='login.php'; </script>";
        }
        }
        else
        {
            echo "<script>alert('user not approved');window.location='login.php';</script>";
        }
        
   }
   else{
    echo "<script>alert('check your email or password');window.location='login.php'; </script>";
}

?>