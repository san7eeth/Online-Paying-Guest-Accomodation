<?php
 include "header.php";
?>
<head>
    <style>
        .radio-button-container {
            display: flex;
            align-items: center;
            gap: 20px; /* Space between radio buttons */
            margin-left: 11px;
        }

        .radio-button-container span {
            color: #000000;
        }

        .radio-button {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .radio-button__input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .radio-button__label {
            display: flex;
            align-items: center;
            padding-left: 25px;
            margin-bottom: 10px;
            margin-top: 10px;
            font-size: 15px;
            color: #000000;
            font-weight: 400;
            cursor: pointer;
            transition: all 0.3s ease;
            line-height: 1.5;
            position: relative;
        }

        .radio-button__custom {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            width: 13px;
            height: 13px;
            border-radius: 50%;
            border: 2px solid #555;
            transition: all 0.3s ease;
        }

        .radio-button__input:checked + .radio-button__label .radio-button__custom {
            background-color: #e83e8c;
            border-color: transparent;
            transform: translateY(-50%) scale(0.8);
            box-shadow: 0 0 20px #e83e8c;
        }

        .radio-button__input:checked + .radio-button__label {
            color: #e83e8c;
        }

        .radio-button__label:hover .radio-button__custom {
            transform: translateY(-50%) scale(1.2);
            border-color: #e83e8c;
            
        }
    </style>
</head>


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
                    <li class="nav-item "><a href="edit.php" class="nav-link">Edit Profile</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Bookings</a>
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
                    <h3 class="mb-3">ROOM REGISTRATION</h3>
                    <form method="POST">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="room-select">Rented By :</label><br>
                                <div class="radio-button-container">
                                    <div class="radio-button">
                                        <input type="radio" id="room-wise" name="room_sell" value="room-wise" class="radio-button__input">
                                        <label for="room-wise" class="radio-button__label">
                                            <span class="radio-button__custom"></span>
                                            Room wise
                                        </label>
                                    </div>
                                    <div class="radio-button">
                                        <input type="radio" id="bed-wise" name="room_sell" value="bed-wise" class="radio-button__input">
                                        <label for="bed-wise" class="radio-button__label">
                                            <span class="radio-button__custom"></span>
                                            Bed wise (PG)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="room-manage">Manage By :</label><br>
                                <div class="radio-button-container">
                                    <div class="radio-button">
                                        <input type="radio" id="owner" name="manage" value="owner" class="radio-button__input">
                                        <label for="owner" class="radio-button__label">
                                            <span class="radio-button__custom"></span>
                                            OWNER
                                        </label>
                                    </div>
                                    <div class="radio-button">
                                        <input type="radio" id="others" name="manage" value="other" class="radio-button__input">
                                        <label for="others" class="radio-button__label">
                                            <span class="radio-button__custom"></span>
                                            OTHERS
                                        </label>
                                    </div>
                                </div>
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
                            $type = $_POST['room_sell'] ?? $type; 
                            $manage = $_POST['manage'] ?? $manage; 
                        }
                        ?>

                        <form action="addroom_action.php?type=<?php echo htmlspecialchars($type)?>&manage=<?php echo htmlspecialchars($manage)?>" method="POST">
                            <?php                       
                            if($manage == 'other') {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="manage_name">Name of Manager:</label>
                                        <input type="text" name="manage_name" class="form-control" placeholder="Name of Manager" required>
                                        <label for="manage_phno">Contact of Manager:</label>
                                        <input type="text" name="manage_no" class="form-control" placeholder="Contact of Manager" required>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>



                           

                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="room_no" class="form-control" placeholder="Room No." required>
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
                                <input type="number" name="room_price" class="form-control" min='1000' placeholder="Price per Month" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="ADD Room" class="btn btn-primary py-3 px-4">
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