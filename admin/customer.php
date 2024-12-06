<?php
include 'header.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html">Cosmo<span>Rentals</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
	        	<!--<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	        	<li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> -->
	          <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
			  <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li> 

			 <nav>
  <ul class="navbar-nav">
    <!-- Main "Register" link -->
    <!--<li class="nav-item"><a href="register.html" class="nav-link">Register</a></li> -->
    
    <!-- Dropdown structure -->
	<li class="nav-item active dropdown">
      <a href="#" class="nav-link dropdown-toggle">Users</a>
      <div class="dropdown-menu">
        <!-- Dropdown options -->
        <a href="customer.php" class="dropdown-item">CUSTOMER</a>
        <a href="owner.php" class="dropdown-item">OWNER</a>
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

<section class="intro">
  <div class="bg-image h-100" style="background-color: #ffff;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
      <br> <br>
      <div class="row justify-content-center">
          <div class="col-12">
          <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
              <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-borderless mb-0" style="padding:30px;">
                    <thead>
                      <tr>
                        <th scope="col">
                          <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                          </div> -->
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    include '../connection.php';
                    $result="SELECT * FROM customer";
                    $sql=mysqli_query($conn,$result);
                    while($data=mysqli_fetch_array($sql))
                    {

                     ?>
                     <tr>
                        <th scope="row">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked/>
                          </div>
                        </th>
                        <td><?php echo $data['fname']?></td>
                        <td><?php echo $data['email']?></td>
                        <td><?php echo $data['phno']?></td>
                        
                      </tr>
                    <?Php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br> <br>

      </div>
    </div>
  </div>
</section>
<?php
include 'footer.php';
?>