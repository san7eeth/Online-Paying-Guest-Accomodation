<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 10px;
    }

    h4 {
      font-size: 1rem;
      margin-bottom: 10px;
    }

    .center {
      margin-top: 20px;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 10px;
    }

    .table-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin: 30px;
    }

    .about {
      margin: 40px;
    }

    button {
  position: relative;
  background-color: rgb(230, 34, 77);
  border-radius: 5px;
  padding: 15px;
  background-repeat: no-repeat;
  cursor: pointer;
  box-sizing: border-box;
  width: 154px;
  height: 49px;
  color: #fff;
  border: none;
  font-size: 20px;
  transition: all 0.3s ease-in-out;
  z-index: 1;
  overflow: hidden;
}

button::before {
  content: "";
  background-color: rgb(248, 50, 93);
  width: 0;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: width 700ms ease-in-out;
  display: inline-block;
}

button:hover::before {
  width: 100%;
}

  </style>
</head>
<body>
  

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
		$result="SELECT fname FROM owner WHERE login_id='$log' ";
		$sql=mysqli_query($conn,$result);
		$data=mysqli_fetch_array($sql)
		?>
	        <ul class="navbar-nav ml-auto">
				<li class="nav-item"> <span class="nav-link">Hello <?php echo $data['fname'];?></span></li>
				
	        
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="edit.php" class="nav-link">Edit Profile</a></li>
	        	<!-- <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>  -->
	        	<!--<li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> -->
	          <!-- <li class="nav-item"><a href="addpg.php" class="nav-link">Add PG</a></li>  -->
			  <nav>
  <ul class="navbar-nav">
    
    <!-- Dropdown structure -->
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle">ADD</a>
      <div class="dropdown-menu">
        <!-- Dropdown options -->
        <a href="addpg.php" class="dropdown-item">House Rental</a>
        <a href="addroom.php" class="dropdown-item">ROOM/PG</a>
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

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2>Room Details</h2>
      </div>
    </div>
    <div class="row d-flex">
      <?php
      if (isset($_GET['room_no'])) {
        $room_no = intval($_GET['room_no']);

        include '../connection.php';

        $result = "SELECT * FROM add_room WHERE room_no=$room_no";
        $sql = mysqli_query($conn, $result);

        if ($sql && mysqli_num_rows($sql) > 0) {
          while ($data = mysqli_fetch_array($sql)) {
      ?>
           <div class="col-md-12 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch" style="height:auto; width:100%; align-items:center;">
                <a href="#" class="block-20 rounded" style="background-image: url('images/<?php echo $data['room_img']; ?>'); height:500px;">
                </a>
                <center><h2><?php echo $data['room_no']; ?></h2></center>
                  <div class="table-container">
                    <div class="col-lg-12">
                      <table>
                        <h4>Details</h4>
                        <tr>
                          <td>Address</td>
                          <td><?php echo $data['room_address']; ?></td>
                        </tr>
                        <tr>
                          <td>State</td>
                          <td><?php echo $data['room_state']; ?></td>
                        </tr>
                        <tr>
                          <td>District</td>
                          <td><?php echo $data['room_district']; ?></td>
                        </tr>
                        <tr>
                          <td>City</td>
                          <td><?php echo $data['room_city']; ?></td>
                        </tr>
                        <tr>
                          <td>Rent per Month</td>
                          <td><?php echo $data['room_price']; ?></td>
                        </tr>
                        
                      </table>
                    </div> 
                    
                    <div class="col-lg-12">
                      <table>
                        <h4>Facilities</h4>
                        <tr>
                          <td>Room Sold</td>
                          <td><?php echo $data['room_sell']; ?></td>
                        </tr>
                        
                        <tr>
                          <td>Bathroom</td>
                          <td><?php echo $data['room_bathroom']; ?></td>
                        </tr>
                        <tr>
                          <td>Kitchen</td>
                          <td><?php echo $data['room_kitchen']; ?></td>
                        </tr>
                        <tr>
                          <td>Furnishing</td>
                          <td><?php echo $data['room_furnishing']; ?></td>
                        </tr>
                        
                          <td>Wifi</td>
                          <td><?php echo $data['room_wifi']; ?></td>
                        </tr>

                        <td>No. of Beds</td>
                          <td><?php echo $data['room_bed']; ?></td>
                        </tr>
                      </table>
                    </div>

                    

                    

                    <div class="col-lg-12">
                      <table>
                      <h4>Video</h4>
                      <tr>
                          <video width ="450" controls>
                            <source src="../images/<?php echo $data['room_vid'];?>" height="500" width="500" type="video/mp4">
                          </video>
                        </tr>
                      </table>
                    </div>

                    <div class="col-lg-12">
                      <table>
                        <h4>Manager</h4>
                        <tr>
                          <td>Name</td>
                          <td><?php echo $data['manage_name']; ?></td>
                        </tr>

                        <tr>
                          <td>Contact</td>
                          <td><?php echo $data['manage_no']; ?></td>
                        </tr>
          </table>

          <div class="about">
                    <h3>Description</h3>
                    <p><?php echo $data['room_description']; ?></p>
                  </div>
                    
          </div>
          </div>
          
   
                  <center><a href="room_edit.php?id=<?php echo $data['room_no']?>"><button style="margin-bottom: 40px;">Edit Room</button></a></center>
                </div>
                
              </div>
        <?php
            }
          } else {
            echo "<p>No details found for the specified apartment.</p>";
          }
        } else {
          echo "<p>No apartment ID specified.</p>";
        }
        ?>
      </div>
    </div>
  </section>

  <?php include "footer.php"; ?>
</body>
</html>
