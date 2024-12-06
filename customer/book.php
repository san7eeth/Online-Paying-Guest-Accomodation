<?php

include "header.php";
$id=$_GET['id'];
$type=$_GET['type'];
?>


<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html">Cosmo<span>Rentals</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">

		  <<?php
		
		include '../connection.php';
    $log=$_SESSION['login_id'];
		$result="SELECT fname FROM customer WHERE login_id='$log' ";
		$sql=mysqli_query($conn,$result);
		$data=mysqli_fetch_array($sql)
		?>
	        <ul class="navbar-nav ml-auto">
				<li class="nav-item"> <span class="nav-link">Hello <?php echo $data['fname'];?></span></li>
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="cus_edit.php" class="nav-link">Edit Profile</a></li>
	        	<!-- <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	        	<li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> -->
	          <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
			  <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li> 

			 <nav>
  <ul class="navbar-nav">
    <!-- Main "Register" link -->
    <!--<li class="nav-item"><a href="register.html" class="nav-link">Register</a></li> -->
    
    <!-- Dropdown structure -->
    
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
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>


<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-end">
	    		<div class="col-lg-4">
				<form action="book_action.php?id=<?php echo $id; ?>&type=<?php echo $type; ?>" method="POST" class="appointment-form">

							<h3 class="mb-3">Booking</h3>
							<div class="row">

							<div class="col-md-12">
									<div class="form-group">
                                        <label>Joining Date:</label>
			    					<input type="date" name='join_date' class="form-control" placeholder="Join Date" min="<?php echo date('Y-m-d')?>" required>
			    				</div>
								</div>

								<!-- <div class="col-md-12">
									<div class="form-group">
			    					<input type="text"name='username' class="form-control" placeholder="User name" required>
			    				</div>
								</div> -->

								<div class="col-md-12">
									<div class="form-group">
                                    <label>Stay Period:</label>
			    					<input type="number" name='stay' class="form-control" placeholder="Stay Period(In Months)" min=1 required>
			    				</div>
								</div>

								<!-- <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Contact Number" name="phno" required 
                                  pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)">
                                 </div>
                                </div>

								<div class="col-md-12">
								<div class="form-group">
								<div class="radio-button-container">
                                 <span>Gender : </span>
  								<div class="radio-button">
 									 <input type="radio" class="radio-button__input" id="radio1" name="gender" value="male">
  									<label class="radio-button__label" for="radio1">
   									 <span class="radio-button__custom"></span>
 								   Male
  								</label>
									</div>
									<div class="radio-button">
 									 <input type="radio" class="radio-button__input" id="radio2" name="gender" value="female">
  									<label class="radio-button__label" for="radio2">
    								<span class="radio-button__custom"></span>
										Female
									</label>
									</div>

								 </div>
								 </div>
								 </div>
		
								
								<div class="col-md-12">
									<div class="form-group">
			    					<input type="password" name='cus_password' class="form-control" placeholder="Password" required>
			    				</div>
								</div> -->

							
								<!-- <div class="col-md-12">
									<div class="form-group">
			    					<input type="password" name='con_password' class="form-control" placeholder=" Confirm Password" required>
			    				</div>
								</div> -->
								
								
								<div class="col-md-12">
									<div class="form-group">
			              <input type="submit" value="BOOK NOW" class="btn btn-primary py-3 px-4">
			            </div>
								</div>

							
							</div>
							
	    			</form>
	    		</div>
	    	</div>
	    </div>
    </section>

	<?php
	include "footer.php";
	?>