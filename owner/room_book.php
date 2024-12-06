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
                  <table class="table table-bordered mb-0"> <!-- Added 'table-bordered' class -->
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">SLNo</th> 
                        <th scope="col">Room Details</th>
                        <th scope="col">Customer Details</th>
                        <th scope="col">Booking Details</th>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Confirm </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    include '../connection.php';
                    $result="SELECT * FROM customer,add_room,booking where booking.room_id=add_room.room_no AND booking.cus_id=customer.login_id AND add_room.room_owner=$log";
                    $sql=mysqli_query($conn,$result);
                    while($data=mysqli_fetch_array($sql))
                    {
                     ?>
                     <tr>
                        <th scope="row"></th>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo "Room no: " .$data['room_no'] . '<br>' ."Room Type: " .$data['room_sell'] . '<br>'."Room Address: " . $data['room_address']; ?></td>
                        <td><?php echo "Name: " . $data['fname']. '<br>' ."Email: " . $data['email'].'<br>'. "Phno: " . $data['phno'].'<br>'."Gender: " . $data['gender'].'<br>'."Aadhaar: " . $data['aadhar']; ?></td>
                        <td><?php echo "Appointment Date: " .$data['join_date'] . '<br>' ."Stay Period: " .$data['stay'] . ' Months'; ?></td>
                        <td><?php echo $data['book_id']?></td>

                        <td>
                        <?php
                          switch ($data['book_status']) {
                              case 'Approved':
                                  echo '<span style="color: green;">Approved</span>';?>
                              <a href="reject.php?id=<?php echo $data['book_id']?>"><button type="button" style="background-color:#ffff;border-radius:20px;">Reject</button></a>
                                 <?php break;
                                    case 'Rejected':
                                     echo '<span style="color: red;">Rejected</span>';
                                    break;
                                    case 'pending':?>
                                      <a href="approve.php?id=<?php echo $data['book_id']?>"><button type="button" class="btn btn-success btn-sm">Approve</button>
                                      
                                      <a href="reject.php?id=<?php echo $data['book_id']?>"><button type="button" class="btn btn-danger btn-sm">Reject</button>
                                       <?php   break;
                                default:
                                    echo '<span style="color: black;">Booked</span>';
                                    break;
                          }
                          ?>
                        </td>
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

<style>
  /* Internal CSS for table borders */
  .table-bordered {
      border: 1px solid #dee2e6; /* Border color for the table */
  }

  .table-bordered th, .table-bordered td {
      border: 1px solid #dee2e6; /* Border color for table cells */
  }

  .table th {
      background-color: #f8f9fa; /* Optional: background color for table headers */
  }
</style>

<?php
include 'footer.php';
?>
