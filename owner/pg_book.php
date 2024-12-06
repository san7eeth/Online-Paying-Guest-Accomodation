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
            <?php
            include '../connection.php';
            $log = $_SESSION['login_id'];
            $result = "SELECT fname FROM owner WHERE login_id='$log' ";
            $sql = mysqli_query($conn, $result);
            $data = mysqli_fetch_array($sql);
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"> <span class="nav-link">Hello <?php echo htmlspecialchars($data['fname']); ?></span></li>
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="edit.php" class="nav-link">Edit Profile</a></li>
                <!-- Report button here -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bookings</a>
                    <div class="dropdown-menu">
                        <a href="pg_book.php" class="dropdown-item">House Booking</a>
                        <a href="room_book.php" class="dropdown-item">ROOM/PG Booking</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">ADD</a>
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
                  <table class="table table-bordered mb-0">
                    <thead>
                      <tr>
                        <th scope="col">SLNo</th> 
                        <th scope="col">House Details</th>
                        <th scope="col">Customer Details</th>
                        <th scope="col">Booking Details</th>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Confirm</th> <!-- Align properly with rest -->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    include '../connection.php';
                    $result="SELECT * FROM customer,add_pg,booking WHERE booking.type='house' AND booking.room_id=add_pg.pg_id AND booking.cus_id=customer.login_id AND add_pg.pg_owner=$log";
                    $sql=mysqli_query($conn,$result);
                    $counter = 1; // For Serial Number
                    while($data=mysqli_fetch_array($sql)) { ?>
                     <tr>
                        <td><?php echo $counter++; ?></td> <!-- Serial number -->
                        <td><?php echo "House name: " .$data['pg_name']  . '<br>'."House Address: " . $data['pg_address']; ?></td>
                        <td><?php echo "Name: " . $data['fname']. '<br>' ."Email: " . $data['email'].'<br>'. "Phno: " . $data['phno'].'<br>'."Gender: " . $data['gender'].'<br>'."Aadhaar: " . $data['aadhar']; ?></td>
                        <td><?php echo "Appointment Date: " .$data['join_date'] . '<br>' ."Stay Period: " .$data['stay'] . ' Months'; ?></td>
                        <td><?php echo $data['book_id']?></td>
                        <td class="button-group">
                        <?php
                          // Display booking status
                          switch ($data['book_status']) {
                              case 'Approved':
                                  echo '<span class="status-approved">Approved</span>';?>
                                  <a href="reject.php?id=<?php echo $data['book_id']?>" class="btn btn-reject btn-sm">Reject</a>
                                  <?php break;
                              case 'Rejected':
                                  echo '<span class="status-rejected">Rejected</span>';
                                  break;
                              default: ?>
                                  <a href="approve_room.php?id=<?php echo $data['book_id']?>&&rid=<?php echo $data['pg_id']?>" class="btn btn-success btn-sm">Approve</a>
                                  <a href="reject.php?id=<?php echo $data['book_id']?>" class="btn btn-reject btn-sm">Reject</a>
                                  <?php break;
                          }
                        ?>
                        </td>
                      </tr>
                    <?php } ?>
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


<style>
  .table-bordered {
    border: 1px solid #dee2e6; 
}

.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
}

.table th {
    background-color: #f8f9fa; 
}

.button-group {
    margin-top: 1rem;
    gap: 20px; 
}

.btn {
    border-radius: 8px;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    color: #ffffff;
    display: inline-block;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-reject {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-sm {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
}

.status-approved {
    color: green;
    font-weight: bold;
}

.status-rejected {
    color: red;
    font-weight: bold;
}

</style>

<?php
include 'footer.php';
?>
