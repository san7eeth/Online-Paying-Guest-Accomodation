<?php
include "header.php";
include '../connection.php';
$log = $_SESSION['login_id'];
$result = "SELECT fname FROM owner WHERE login_id='$log'";
$sql = mysqli_query($conn, $result);
$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vacation Rental - Rent your PG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

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
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="edit.php" class="nav-link">Edit Profile</a></li>
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
                    <li class="nav-item"><a href="report.php" class="nav-link">Report</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Include other content here -->

</body>
</html>



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


    
   
    <!-- <section class="ftco-section ftco-services"> -->
	<div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Your Rooms & PGs</h2>
            </div>
        </div>
    	<div class="container">
    	<div class="row">
          <?php
		
		  include '../connection.php';
		  $log=$_SESSION['login_id'];
		  $result="SELECT * FROM add_room WHERE room_owner='$log'";
		  $sql=mysqli_query($conn,$result);

		  if (mysqli_num_rows($sql) > 0) {

		  while($data=mysqli_fetch_array($sql))
		  {
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
		  }
		}else {
        echo '<H6>NO ROOMS OR PG AVAILABLE.ADD YOUR ROOM OR PG</H6>';
    }

		  ?>
    	</div>
    </section>

    <section class="ftco-section bg-light">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Your House Rentals</h2>
            </div>
        </div>
        <div class="row no-gutters">
            <?php
                include '../connection.php';
				$log=$_SESSION['login_id'];
                $result = "SELECT * FROM add_pg WHERE pg_owner='$log'";
                $sql = mysqli_query($conn, $result);
			
				if (mysqli_num_rows($sql) > 0) {
                while ($data = mysqli_fetch_array($sql)) {
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
                }
			}else {
				echo '<H6>NO HOUSE RENTALS AVAILABLE.ADD YOUR House Rental</H6>';
			}
            ?>
        </div>
    </div>
</section>


        </div>
      </div>
    </section>

<?php
	include "footer.php";
?>
  

  