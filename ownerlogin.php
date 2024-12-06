<?php
 include "header.php";
?>


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
						<form action="#" class="appointment-form">
							<h3 class="mb-3">OWNER LOGIN</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
			    					<input type="text" name='ownername' class="form-control" placeholder="Owner name">
			    				</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
			    					<input type="text" class="form-control" placeholder="Password">
			    				</div>
								</div>

								
								<div class="col-md-12">
									<div class="form-group">
			              <input type="submit" value="LOGIN" class="btn btn-primary py-3 px-4">
			            </div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
			    					<p style=text-align:center;>Don't have an account? <a href="ownersignup.php">Register</a></p>
			    				</div>
								</div>
							</div>
	    			</form>
	    		</div>
	    	</div>
	    </div>
    </section>

	<?php
	include "footer.php";
	?>