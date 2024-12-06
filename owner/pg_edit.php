<?php
include "header.php";
$log=$_SESSION['login_id'];
$id=$_GET['id'];
include "connection.php";
// $row="SELECT * from owner,login where login.login_id=owner.login_id and login.login_id='$log'";
$row="SELECT * from add_pg,login where login.login_id=add_pg.pg_owner and login.login_id='$log' AND add_pg.pg_id='$id' ";
$result=mysqli_query($conn,$row);
$query=mysqli_fetch_array($result);
?>


<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html">Vacation<span>Rental</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
	        	<!--<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="services.html" class="nav-link">Services</a></li> -->
	        	<!--<li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> -->
	          <!-- <li class="nav-item"><a href="addpg.php" class="nav-link">Add PG</a></li>  -->
			  <nav>
  <!--<ul class="navbar-nav"> -->
    
    <!-- Dropdown structure -->
    <!--<li class="nav-item active dropdown">
      <a href="#" class="nav-link dropdown-toggle">ADD</a>
      <div class="dropdown-menu">-->
        <!-- Dropdown options -->
        <!-- <a href="addpg.php" class="dropdown-item">PG</a>
        <a href="addroom.php" class="dropdown-item">ROOM</a> -->
        <!-- Add more options here if needed -->
      <!-- </div> 
    </li>
  </ul> -->
</nav>
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


<div class="hero-wrap js-fullheight" style="background-image: url('images/download.jpg');" data-stellar-background-ratio="0.5">
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
						<form action="pg_edit_action.php?id=<?php  echo $id ?>" method="POST" class="appointment-form">
							<h3 class="mb-3">UPDATE HOUSE DETAILS</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
                                    <label>House Name:</label>
			    					<input type="text" name= "pg_name"class="form-control" value="<?php echo $query['pg_name']?>" required>
			    				</div>
								</div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                     <textarea class="form-control" name="pg_address" id='address' placeholder="Address(Including PINCODE)" rows="3" required></textarea>
                               </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State:</label>
                                    <select class="form-control" name="pg_state" id="state" onchange="populateDistricts()">
                                        <option value="">Select State</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="district">District:</label>
                                    <select class="form-control" name="pg_district" id="district" onchange="populateCities()">
                                        <option value="">Select District</option>
                                        <!-- Options for districts will be populated dynamically -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <select class="form-control" name="pg_city" id="city">
                                        <option value="">Select City</option>
                                        <!-- Options for cities will be populated dynamically -->
                                    </select>
                                </div>
                            </div>

                                
                                <!-- <div class="col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="phno" placeholder="Phone number" id="phoneNumber" required 
                                  pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)">
                                 </div>
                                </div> -->

                                <div class="col-md-12">
                                  <div class="form-group">
                                     <textarea class="form-control" name="pg_description" id='description' placeholder="Description" rows="3" required></textarea>
                               </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room-select">Bedrooms</label>
                                    <select class="form-control" name="pg_bedroom" id="pg_bedroom" required>
                                        <option value="" disabled selected>Select no. of room</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5+">5+</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room-select">Bathrooms</label>
                                    <select class="form-control" name="pg_bathroom" id="pg_bathroom" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4+">4+</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room-select">Kitchen</label>
                                    <select class="form-control" name="pg_kitchen" id="pg_kitchen" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>
                            </div>
                            


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room-select">Furnishing</label>
                                    <select class="form-control" name="pg_furnishing" id="pg_furnishing" required>
                                        <option value="" disabled selected>Select </option>
                                        <option value="Furnished">Furnished</option>
                                        <option value="Semi-Furnished">Semi-Furnished</option>
                                        <option value="Unfurnished">Unfurnished</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room-select">Car-parking</label>
                                    <select class="form-control" name="pg_parking" id="pg_parking" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room-select">Wifi</label>
                                    <select class="form-control" name="pg_wifi" id="pg_wifi" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>
                            </div>
                            
								
								<div class="col-md-12">
                                <div class="form-group">
                                 <label for="id-proof">Upload PG IMAGE</label>
                                 <input type="file" class="form-control" name= "pg_img" id="pg_img" placeholder="Add Image" required>
                                 </div>
                                </div>

                                <div class="col-md-12">
                                <div class="form-group">
                                 <label for="id-proof">Upload PG VIDEO</label>
                                 <input type="file" class="form-control" name= "pg_vid" id="pg_vid" placeholder="Add video" required>
                                 </div>
                                </div>


                                <div class="col-md-12">
									<div class="form-group">
			    					<input type="number" name="pg_price" class="form-control" min='1000' placeholder="Price per Month" required >
			    				</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
			              <input type="submit" value="UPDATE" class="btn btn-primary py-3 px-4">
			            </div>
								</div>

								<!-- <div class="col-md-12">
									<div class="form-group">
			    					<p style=text-align:center;>Already have an account? <a href="login.php">Login</a></p>
			    				</div>
								</div> -->
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