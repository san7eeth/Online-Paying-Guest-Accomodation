<?php
include "header.php";
$log=$_SESSION['login_id'];
$id=$_GET['id'];
include "connection.php";
// $row="SELECT * from owner,login where login.login_id=owner.login_id and login.login_id='$log'";
$row="SELECT * from add_room,login where login.login_id=add_room.room_owner and login.login_id='$log' AND add_room.room_no='$id' ";
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
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        	<!--<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="services.html" class="nav-link">Services</a></li> -->
	        	<!--<li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> -->
	          <!-- <li class="nav-item"><a href="addpg.php" class="nav-link">Add PG</a></li>  -->
			  <nav>
  <ul class="navbar-nav">
    
    <!-- Dropdown structure -->
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle">ADD</a>
      <div class="dropdown-menu">
        <!-- Dropdown options -->
        <a href="addpg.php" class="dropdown-item">PG</a>
        <a href="addroom.php" class="dropdown-item">ROOM</a>
        <!-- Add more options here if needed -->
      </div>
    </li>
  </ul>
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
                <div class="appointment-form">
                    <h3 class="mb-3">ROOM DETAILS</h3>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="room-select" >Rented By :</label><br>
                                     <input type="radio" name="room_sell" value="room-wise">Room wise
                                    <input type="radio" name="room_sell" value="bed-wise">Bed wise(PG) 
                                </div>
                            </div>

                            <div class="col-md-12">
                        <div class="form-group">
                        <label for="room-select">Rented By :</label><br>
                                    OWNER <input type="radio" name="manage" value="owner">
                                    OTHERS <input type="radio" name="manage" value="other">
                        </div>
                    </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" name="submit_button" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    $type = 'room-wise';
                    $manage = 'owner';
                    if (isset($_REQUEST['submit_button'])) {
                        $type = $_POST['room_sell'];
                        $manage = $_POST['manage'];
                    }
                    ?>

                    <form action="room_edit_action.php?type=<?php echo $type?>&&manage=<?php echo $manage?>&&id=<?php  echo $id ?>" method="POST">
                        <?php                       
                          if($manage == 'other') {
                        ?>

                       
                        
                         <div class="row">
                         <div class="col-md-12">
                        <div class="form-group">
                            <label for="manage_name">Name of Manager:</label>
                            <input type="text" name="manage_name" class="form-control" value="<?php echo $query['manage_name']?>" required>
                            <label for="manage_phno">Contact of Manager:</label>
                            <input type="text" name="manage_no" class="form-control" value="<?php echo $query['manage_no']?>" required>
                        </div>
                    </div>
                          </div>


                        <?php
                        }
                      
                        ?>


                           

                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Room no:</label>
                                <input type="text" name="room_no" class="form-control" value="<?php echo $query['room_no']?>" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="room_address" id='address' placeholder="Address (Including PINCODE)" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state">State:</label>
                                <select class="form-control" name="room_state" id="state" onchange="populateDistricts()" required>
                                    <option value="">Select State</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district">District:</label>
                                <select class="form-control" name="room_district" id="district" onchange="populateCities()" required>
                                    <option value="">Select District</option>
                                    <!-- Options for districts will be populated dynamically -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">City:</label>
                                <select class="form-control" name="room_city" id="city" required>
                                    <option value="">Select City</option>
                                    <!-- Options for cities will be populated dynamically -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="room_description" id='description' placeholder="Description about room" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="room-select">Number of beds</label>
                                <select class="form-control" name="room_bed" id="room_bed" required>
                                    <option value="" disabled selected>Select Beds</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="room-select">Bathrooms</label>
                                <select class="form-control" name="room_bathroom" id="room_bathroom" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Attached">Attached</option>
                                    <option value="Not Attached">Not Attached</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="room-select">Cooking</label>
                                <select class="form-control" name="room_kitchen" id="room_kitchen" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="room-select">Furnishing</label>
                                <select class="form-control" name="room_furnishing" id="room_furnishing" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Furnished">Furnished</option>
                                    <option value="Semi-Furnished">Semi-Furnished</option>
                                    <option value="Unfurnished">Unfurnished</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="room-select">Wifi</label>
                                <select class="form-control" name="room_wifi" id="room_wifi" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id-proof">Upload Room IMAGE</label>
                                <input type="file" class="form-control" name="room_img" id="room_img" placeholder="Add Image" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id-proof">Upload Room VIDEO</label>
                                <input type="file" class="form-control" name="room_vid" id="room_vid" placeholder="Add video" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" name="room_price" class="form-control" min='1000' value="<?php echo $query['room_price']?>" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Edit Room" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                      </div>
        </div>
    </div>
    <script src="statescript.js"></script>
</section>

    

	<?php
	include "footer.php";
	?>