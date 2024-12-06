<?php
include 'header.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="#">Cosmo<span>Rentals</span></a>
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
	        	<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
            <!--<li class="nav-item"><a href="your_book.php" class="nav-link">Your Bookings</a></li>-->
	        	<li class="nav-item active"><a href="#" class="nav-link">Payment</a></li>
	        	
			  <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li> 

			 

</ul>
	      </div>
	    </div>
	  </nav>


 



        <div class="container d-flex justify-content-center mt-5 mb-5">

            

<div class="row g-3">

  <div class="col-md-6">  
    
    <span>Payment Method</span>
    <?php
    $id=$_GET['id'];
    ?>
    <div class="card">
    <link rel="stylesheet" href="css/payment.css">

      <div class="accordion" id="accordionExample">
        
        <div class="card">
          <div class="card-header p-0" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="d-flex align-items-center justify-content-between">

                  <span>Cash</span>
                  <img src="https://cdn-icons-png.flaticon.com/128/12740/12740855.png" width="30"> 
                  
                </div>
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="p-3">
           <a href="cpayment_action.php?id=<?php echo $id ?>"><button class="btn btn-primary btn-block free-button">Book Now</button> </a>
          <!-- <div class="text-center">
          <a href="#">Have a promo code?</a>
          </div> -->
            
          </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header p-0">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="d-flex align-items-center justify-content-between">

                  <span>Credit card</span>
                  <div class="icons">
                    <img src="https://i.imgur.com/2ISgYja.png" width="30">
                    <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                    <img src="https://i.imgur.com/35tC99g.png" width="30">
                  </div>
                  
                </div>
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body payment-card-body">
              
              <span class="font-weight-normal card-text">Card Number</span>
              <div class="input">

                <i class="fa fa-credit-card"></i>
                <input type="text" class="form-control" placeholder="0000 0000 0000 0000" pattern="[0-9]{16}" required>
                
              </div> 

              <div class="row mt-3 mb-3">

                <div class="col-md-6">

                  <span class="font-weight-normal card-text">Expiry Date</span>
                  <div class="input">

                    <i class="fa fa-calendar"></i>
                    <input type="Month" class="form-control" placeholder="MM/YY" min="<?php echo "$currentYear-$currentMonth"; ?>" required>
                    
                  </div> 
                  
                </div>


                <div class="col-md-6">

                  <span class="font-weight-normal card-text">CVC/CVV</span>
                  <div class="input">

                    <i class="fa fa-lock"></i>
                    <input type="text" class="form-control" placeholder="000" pattern="[0-9]{3}" required>
                    
                  </div> 
                  
                </div>
                

              </div>

              <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
             
            </div>

            <div class="p-3">

         <a href="opayment_action.php?id=<?php echo $id ?>"> <button class="btn btn-primary btn-block free-button">Pay Now</button> </a>
          <!-- <div class="text-center">
          <a href="#">Have a promo code?</a>
          </div> -->
            
          </div>


          </div>
        </div>
        
      </div>
      
    </div>

  </div>

  <div class="col-md-6">
      <span>Summary</span>

      <div class="card">

        <div class="d-flex justify-content-between p-3">

          <div class="d-flex flex-column">

            <span>Your Booking Details</span>
            <label>Check In</label>
            <?php
             $id=$_GET['id'];
             include '../connection.php';
             $result="SELECT * FROM customer,booking where  booking.cus_id=customer.login_id AND booking.cus_id=$log AND booking.book_id=$id";
             $sql=mysqli_query($conn,$result);
             while($data=mysqli_fetch_array($sql))
             {
             echo  $data['join_date'] . '<br>' ."Stay Period: " .$data['stay'] . ' Months';
             $joindate=$data['join_date'];
             $stay1=$data['stay'];
             $stay=$data['stay'];
             $stay="+ $stay month";
             
             }
             ?>

            <label>Check Out</label>
             
            <?php
               
                $calc=date('Y-m-d',strtotime($stay,strtotime($joindate)));
                echo "$calc";
            ?>
             
          </div>

          <!-- <div class="mt-1">
            <sup class="super-price">$9.99</sup>
            <span class="super-month">/Month</span>
          </div>
           -->
        </div>

        <div class="card">

        <div class="d-flex justify-content-between p-3">

          <div class="d-flex flex-column">

            <span>Amount</span>
            <span><?php 
              $id=$_GET['id'];
              $price=$_GET['price'];
              include '../connection.php';
               
                
                
                  

                  
                 
                  // Output the results
                  $totalamount = $price*$stay1;
                   echo "Price per Month: " . $price . "<br>";
                  // echo "PG Price: " . $pgPrice . "<br>";
                  echo "Total Amount : " . $totalamount;
                  $advance=(25/100)*$totalamount;
                
              


        
              ?>
              </span>
            
          </div>

            </div>
          
          

        </div>

        <hr class="mt-0 line">


        <div class="p-3 d-flex justify-content-between">

          <div class="d-flex flex-column">

            <span>Advance to be paid</span>
            <small>25% of total payment</small>
            
          </div>
          <span><?php echo $advance; ?></span>

          

        </div>


        <!-- <div class="p-3">

        <button class="btn btn-primary btn-block free-button">Pay Now</button> 
        <div class="text-center">
         <a href="#">Have a promo code?</a>
       </div> 
          
        </div> -->



        
      </div>
  </div>
  
</div>


</div>




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
