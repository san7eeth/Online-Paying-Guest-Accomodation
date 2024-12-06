
<?php
include "header.php";
$log=$_SESSION['login_id'];
include "connection.php";
$row="SELECT * from owner,login where login.login_id=owner.login_id and login.login_id='$log'";
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
                    <li class="nav-item">
                        <span class="nav-link">Hello <?php echo htmlspecialchars($data['fname']); ?></span>
                    </li>
                    <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item active"><a href="edit.php" class="nav-link">Edit Profile</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bookings</a>
                        <div class="dropdown-menu">
                            <a href="pg_book.php" class="dropdown-item">House Booking</a>
                            <a href="room_book.php" class="dropdown-item">ROOM/PG Booking</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">ADD</a>
                        <div class="dropdown-menu">
                            <a href="addpg.php" class="dropdown-item">House Rental</a>
                            <a href="addroom.php" class="dropdown-item">ROOM/PG</a>
                        </div>
                    </li>
                    <li class="nav-item "><a href="report.php" class="nav-link">Report</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
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
						<form action="edit_action.php" method="POST" class="appointment-form">
							<h3 class="mb-3">OWNER DETAILS</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
                                    <label for="name">Name</label>
			    					<input type="text" name= "fname"class="form-control" value="<?php echo $query['fname']?>" required>
			    				</div>
								</div>

                                <!-- <div class="col-md-12">
									<div class="form-group">
			    					<input type="text" name="username" class="form-control" placeholder="User Name" required>
			    				</div>
								</div> -->


                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State:</label>
                                    <select class="form-control" name="owner_state" id="state" onchange="populateDistricts()">
                                        <option value="">Select State</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="district">District:</label>
                                    <select class="form-control" name="district" id="district" onchange="populateCities()">
                                        <option value="">Select District</option>
                                        <!-- Options for districts will be populated dynamically -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select City</option>
                                        <!-- Options for cities will be populated dynamically -->
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                  <div class="form-group">
                                  <label for="owner_address">Address</label>
                                     <textarea class="form-control" name="owner_address"  value="<?php echo $query['owner_address']?>" rows="3" required></textarea>
                               </div>
                                </div>


								<div class="col-md-12">
									<div class="form-group">
                                    <label for="email">Email</label>
			    					<input type="email" name="email" class="form-control" value="<?php echo $query['email']?>" required>
			    				</div>
								</div>
								
                                <div class="col-md-12">
                                <div class="form-group">
                                <label for="phno">Phone Number</label>
                                  <input type="text" class="form-control" name="phno" value="<?php echo $query['phno']?>" id="phoneNumber" required 
                                  pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)">
                                 </div>
                                </div>

                              


                                <div class="col-md-12">
                                <div class="form-group">
                                 <label for="id-proof">Upload ID proof</label>
                                 <input type="file" class="form-control" name= "id_proof" id="id-proof" value="<?php echo $query['id_proof']?>" required>
                                 </div>
                                </div>


								<div class="col-md-12">
									<div class="form-group">
                                    <label for="password">Password</label>
			    					<input type="password" name="cus_password" class="form-control" value="<?php echo $query['cus_password']?>" required>
			    				</div>
								</div>

							
								<!-- <div class="col-md-12">
									<div class="form-group">
			    					<input type="password" name="con_password"class="form-control" placeholder=" Confirm Password" required>
			    				</div>
								</div>
								 -->
								
								<div class="col-md-12">
									<div class="form-group">
			              <input type="submit" value="UPDATE" class="btn btn-primary py-3 px-4">
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