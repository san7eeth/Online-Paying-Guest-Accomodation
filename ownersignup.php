
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
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li> 

			 <nav>
  <ul class="navbar-nav">
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
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p>
          </div>
        </div>
      </div>
    </div>


<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-end">
	    		<div class="col-lg-4">
						<form action="owner_action.php" method="POST" class="appointment-form">
							<h3 class="mb-3">OWNER REGISTRATION</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
			    					<input type="text" name= "fname"class="form-control" placeholder="Owner name" required>
			    				</div>
								</div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="state">State:</label>
                        <select class="form-control" name="owner_state" id="state" onchange="populateDistricts()" required>
                            <option value="">Select State</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="district">District:</label>
                        <select class="form-control" name="district" id="district" onchange="populateCities()" required>
                            <option value="">Select District</option>
                            <!-- Options for districts will be populated dynamically -->
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">City:</label>
                        <select class="form-control" name="city" id="city" required>
                            <option value="">Select City</option>
                            <!-- Options for cities will be populated dynamically -->
                        </select>
                    </div>
                </div>


                            <div class="col-md-12">
                                  <div class="form-group">
                                     <textarea class="form-control" name="owner_address" id='address' placeholder="Address" rows="3" required></textarea>
                               </div>
                                </div>


								<div class="col-md-12">
									<div class="form-group">
			    					<input type="email" name="email" class="form-control" placeholder="Email" required>
			    				</div>
								</div>
								
                                <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="phno" placeholder="Phone number" id="phoneNumber" required 
                                  pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)">
                                 </div>
                                </div>

                              


                                <div class="col-md-12">
                                <div class="form-group">
                                 <label for="id-proof">Upload ID proof</label>
                                 <input type="file" class="form-control" name= "id_proof" id="id-proof" placeholder="ID proof" required>
                                 </div>
                                </div>


								<div class="col-md-12">
									<div class="form-group">
			    					<input type="password" name="cus_password" class="form-control" placeholder="Password" required>
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
        <script src="statescript.js"></script>
    </section>
    

	<?php
	include "footer.php";
	?>