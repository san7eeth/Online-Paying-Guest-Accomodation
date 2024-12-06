<?php
include 'header.php';
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
                  <table class="table table-borderless mb-0">
                    <thead>
                      <tr>
                        <th scope="col">
                          <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                          </div> -->
                        </th>
                        <th scope="col">SLNo</th> 
                        <th scope="col">Room no.</th>
                        <th scope="col">Room type</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Customer Contact</th>
                        <th scope="col">Customer Address</th>
                        <th scope="col">Customer ID number</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Stay Period</th>
                        <th scope="col">Confirm </th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    include '../connection.php';
                    $result="SELECT * FROM owner";
                    $sql=mysqli_query($conn,$result);
                    while($data=mysqli_fetch_array($sql))
                    {

                     ?>
                     <tr>
                        <th scope="row">
                          <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked/>
                          </div> -->
                        </th>
                        <td><?php echo $data['reg_id']?></td>
                        <td><?php echo $data['fname']?></td>
                        <td><?php echo $data['email']?></td>
                        <td><?php echo $data['phno']?></td>
                        <td><?php echo $data['owner_address']?></td>
                        <td><img src="../images/<?php echo $data['id_proof']?>" width="250px"></td>
                        <td>State : <?php echo $data['owner_state']?>
                        <br>District : <?php echo $data['district']?>
                        <br>City : <?php echo $data['city']?></td>
                        <td><a href="approve.php?id=<?php echo $data['login_id']?>"><button type="button" style="background-color:#dc3545;border-radius:20px;">Approve</button></a></td>
                        <td><a href="reject.php?id=<?php echo $data['login_id']?>"><button type="button" style="background-color:#ffff;border-radius:20px;">Reject</button></a></td>
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