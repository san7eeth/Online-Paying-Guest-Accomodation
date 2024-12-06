<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $password = $_POST['password'];
    $confirm_password = $_POST['cus_password'];
    $inputId = $_POST['inputId']; 
    $email = $_POST['email']; 


    if ($password === $confirm_password) {

      
        if (isset($email)) {
            $email = mysqli_real_escape_string($conn, $email);

            $update_query = "UPDATE login SET cus_password = '$password' WHERE email = '$email'";

            if (mysqli_query($conn, $update_query)) {
                echo "<script>
                        alert('Password has been updated successfully.');
                        window.location.href = 'login.php';
                      </script>";
            } else {
                echo "<script>alert('Error updating password: " . addslashes($error_message) . "'); window.location.href='forgot_password.php';</script>";
            }
        } else {
            echo "<script>alert('Email is not set')</script>";
        }
    } else {
        echo "<script>alert('Password Not Match');window.location='forgot_password.php';</script>";
    }
}
?>
