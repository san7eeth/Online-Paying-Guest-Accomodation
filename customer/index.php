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

		  <?php
		
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

    <div class="hero-wrap js-fullheight" style="background-image: url('images/download.jpg');" data-stellar-background-ratio="0.5">
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

    
   
    <!-- <section class="ftco-section ftco-services"> -->
    	<div class="container">
    	<div class="row">
          <?php
		
		  include '../connection.php';
		  $result="SELECT * FROM add_room";
		  $sql=mysqli_query($conn,$result);
		  while($data=mysqli_fetch_array($sql))
		  {
        $room_id=$data['room_no'];
        $disp="SELECT * FROM booking WHERE room_id=$room_id AND (book_status='Booked with cash' OR book_status='Booked with Online Payment') ";
        $show=mysqli_query($conn,$disp);
        if( mysqli_num_rows($show)>0)
       {
        continue;
       }
       else{
			?>
		  <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(../images/<?php echo $data['room_img']?>);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading"><?php echo $data['room_no']?></h3>
                <p><?php echo $data['room_description']?></p>
                <p><a href="room.php?room_no=<?php echo $data['room_no']; ?>" class="btn btn-primary">View Room Details </a></p>
              </div>
            </div>      
          </div>
        <?php 
		  }}
		  ?>
    	</div>
    </section>

    <section class="ftco-section bg-light">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>House</h2>
            </div>
        </div>
        <div class="row no-gutters">
            <?php
                include '../connection.php';
                $result = "SELECT * FROM add_pg WHERE pg_bedroom>0" ;
                $sql = mysqli_query($conn, $result);
                while ($data = mysqli_fetch_array($sql)) {
                  $room_id=$data['pg_id'];
                  $disp="SELECT * FROM booking WHERE room_id=$room_id AND (book_status='Booked with cash' OR book_status='Booked with Online Payment') ";
                  $show=mysqli_query($conn,$disp);
                  if( mysqli_num_rows($show)>0)
                 {
                  continue;
                 }
                 else{

            ?>
            <div class="col-lg-6">
                <div class="room-wrap d-md-flex">
                    <a href="#" class="img" style="background-image: url(images/<?php echo $data['pg_img']; ?>);"></a>
                    <div class="half left-arrow d-flex align-items-center">
                        <div class="text p-4 p-xl-5 text-center">
                            <h3 class="mb-3"><?php echo $data['pg_name']; ?></h3>
                            <!-- <ul class="list-accommodation">
                                <li><span>Max:</span> 3 Persons</li>
                                <li><span>Size:</span> 45 m2</li>
                                <li><span>View:</span> Sea View</li>
                                <li><span>Bed:</span> 1</li>
                            </ul> -->
                            <p class="pt-1"><a href="apartment.php?pg_id=<?php echo $data['pg_id']; ?>" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }}
            ?>
        </div>
    </div>
</section>



    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Happy Clients &amp; Feedbacks</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
							<div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_2.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_3.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_4.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
						</div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 wrap-about">
						<div class="img img-2 mb-4" style="background-image: url(images/about.jpg);">
						</div>
						<h2>The most recommended vacation rental</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section">
	          	<div class="pl-md-5">
		            <h2 class="mb-2">What we offer</h2>
	            </div>
	          </div>
	          <div class="pl-md-5">
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
							<div class="row">
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-diet"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Tea Coffee</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div> 
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-workout"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Hot Showers</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div>
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-diet-1"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Laundry</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div>      
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-first"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Air Conditioning</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div>
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-first"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Free Wifi</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div> 
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-first"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Kitchen</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div> 
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-first"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Ironing</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div> 
		            <div class="services-2 col-lg-6 d-flex w-100">
		              <div class="icon d-flex justify-content-center align-items-center">
		            		<span class="flaticon-first"></span>
		              </div>
		              <div class="media-body pl-3">
		                <h3 class="heading">Lovkers</h3>
		                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
		              </div>
		            </div>
		          </div>  
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="ftco-intro" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9 text-center">
						<h2>Ready to get started</h2>
						<p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
						<p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Book now</a> <a href="#" class="btn btn-white px-4 py-3">Contact us</a></p>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Latest news from our blog</h2>
            <span class="subheading">News &amp; Blog</span>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text p-4 text-center">
                <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a></h3>
                <div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text p-4 text-center">
                <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a></h3>
                <div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text p-4 text-center">
                <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a></h3>
                <div class="meta mb-2">
                  <div><a href="#">January 30, 2020</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
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
    
  

  