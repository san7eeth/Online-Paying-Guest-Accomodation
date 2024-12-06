<?php
include "header.php";
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Cosmo<span>Rentals</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                <!--<li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> -->
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item active"><a href="Login.php" class="nav-link">Login</a></li> 

                <nav>
                    <ul class="navbar-nav">
                        <!-- Main "Register" link -->
                        <!--<li class="nav-item"><a href="register.html" class="nav-link">Register</a></li> -->
                        
                        <!-- Dropdown structure -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle">Register</a>
                            <div class="dropdown-menu">
                                <!-- Dropdown options -->
                                <a href="signup.php" class="dropdown-item">USER</a>
                                <a href="ownersignup.php" class="dropdown-item">OWNER</a>
                                <!-- Add more options here if needed -->
                            </div>
                        </li>
                    </ul>
                </nav>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Welcome to Vacation Rental</h2>
                <h1 class="mb-4">Rent an apartment for your vacation</h1>
                <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <?php
    include 'connection.php';
    
    $name = ''; // Initialize the $name variable to avoid undefined variable error

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phno = mysqli_real_escape_string($conn, $_POST['phno']);
        
        $query = "SELECT email, fname,phno FROM customer WHERE email = '$email' AND phno='$phno'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row["fname"];?>

          <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <form action="update_forgot.php" method="post" class="appointment-form">
                    <h3 class="mb-3">Reset Password</h3>
                    <?php if (!empty($name)): ?>
                        <span>Hi <?php echo htmlspecialchars($name); ?></span>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Enter your New Password:" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="cus_password" placeholder="Retype Your Password:" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <button class="btn btn-primary py-3 px-4">Update<input type="hidden" name="inputId" value="<?php echo htmlspecialchars($inputId); ?>"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> 

        <?php
        } else {
            
            $query = "SELECT email, fname FROM owner WHERE email = '$email'AND phno='$phno'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $name = $row["fname"]; ?>

                <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-4">
                        <form action="update_forgot.php" method="post" class="appointment-form">
                            <h3 class="mb-3">Reset Password</h3>
                            <?php if (!empty($name)): ?>
                                <span>Hi <?php echo htmlspecialchars($name); ?></span>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter your New Password:" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="cus_password" placeholder="Retype Your Password:" required>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                <button class="btn btn-primary py-3 px-4">Update<input type="hidden" name="inputId" value="<?php echo htmlspecialchars($inputId); ?>"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
            } else {
                echo "<script>alert('Check your Email or Phone number');window.location='forgot_password.php';</script>";
            }
        }
        
    }

    
    $inputId = "submit_" . uniqid();
    ?>
    
    

<?php
include "footer.php";
?>
