<?php
 include "header.php";
?>
<head>
    <style>
        .radio-button-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 11px;
        }
        
        .radio-button-container span {
            color: #000000;
        }
        
        .radio-button {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }
        
        .radio-button__input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .radio-button__label {
            display: inline-block;
            padding-left: 25px; /* Adjusted padding to center align the circle */
            margin-bottom: 10px;
            margin-top: 10px;
            position: relative;
            font-size: 15px;
            color: #000000;
            font-weight: 400;
            cursor: pointer;
            transition: all 0.3s ease;
            line-height: 1.5; 
        }
        
        .radio-button__custom {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%); 
            width: 13px;
            height: 13px;
            border-radius: 50%;
            border: 2px solid #555;
            transition: all 0.3s ease;
        }
        
        .radio-button__input:checked + .radio-button__label .radio-button__custom {
            background-color: #e83e8c;
            border-color: transparent;
            transform: translateY(-50%) scale(0.8);
            box-shadow: 0 0 20px #e83e8c;
        }
        
        .radio-button__input:checked + .radio-button__label {
            color: #e83e8c;
        }
        
        .radio-button__label:hover .radio-button__custom {
            transform: translateY(-50%) scale(1.2); 
            border-color: #e83e8c;
        }
    </style>
</head>



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
			  <li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li> 

			 <nav>
  <ul class="navbar-nav">
    <!-- Main "Register" link -->
    <!--<li class="nav-item"><a href="register.html" class="nav-link">Register</a></li> -->
    
    <!-- Dropdown structure -->
    <li class="nav-item active dropdown">
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
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
          </div>
        </div>
      </div>
    </div>


<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-end">
	    		<div class="col-lg-4">
						<form action="customer_action.php" method='POST' class="appointment-form">
							<h3 class="mb-3">USER REGISTRATION</h3>
							<div class="row">

							<div class="col-md-12">
									<div class="form-group">
			    					<input type="text" name='fname' class="form-control" placeholder="Full name" required>
			    				</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
			    					<input type="email" name='email' class="form-control" placeholder="Email" required>
			    				</div>
								</div>

								<div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Contact Number" name="phno" required 
                                  pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)">
                                 </div>
                                </div>


								<div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Aadhar Number" name="aadhar" required 
                                  pattern="[0-9]{12}" title="Please enter a valid aadhar number(numbers only)">
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
								</div>
								<div class="col-md-12">
									<div class="form-group">
			              <input type="submit" value="REGISTER" class="btn btn-primary py-3 px-4">
			            </div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
			    					<p style=text-align:center;>Already have an account? <a href="login.php">Login</a></p>
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