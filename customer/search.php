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
            <li class="nav-item"><a href="your_book.php" class="nav-link">Your Bookings</a></li>
	        	<li class="nav-item"><a href="cus_edit.php" class="nav-link">Edit Profile</a></li>
	        	<!-- <li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> --> 
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
          	<h2 class="subheading">Welcome to Cosmo Rentals</h2>
          	<h1 class="mb-4">Rent an appartment for your stay</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-intro" style="background-color: transparent;" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>Go for your Room</h2>
            <form action="search.php" method="POST">
						<div class="row">
						<div class="col-md-3">
                                <div class="form-group">
                                    <label for="room-select">Room/PG</label>
                                    <select class="form-control" name="pg_type" id="pg_type" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="House">House rental</option>
                                        <option value="Room">Room</option>
                                        <option value="PG">PG</option>
                                    </select>
                                </div>
                            </div>

							<div class="col-md-3">
                                <div class="form-group">
                                    <label for="state">State:</label>
                                    <select class="form-control" name="state" id="state" onchange="populateDistricts()">
                                        <option value="">Select State</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="district">District:</label>
                                    <select class="form-control" name="district" id="district" onchange="populateCities()">
                                        <option value="">Select District</option>
                                        <!-- Options for districts will be populated dynamically -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select City</option>
                                        <!-- Options for cities will be populated dynamically -->
                                    </select>
                                </div>
                            </div>
</div>


            <button type="submit" class="btn btn-white px-4 py-3">Search</button>
          </form>
					</div>
				</div>
			</div>
		</section>

    
   
        <?php
	include "search_result.php";
?>

      <script src="statescript.js"></script>
    </section>

<?php
	include "footer.php";
?>