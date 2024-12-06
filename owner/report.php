<?php
include 'header.php';
include '../connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$log = $_SESSION['login_id'];

// Default date range
$fromdate = isset($_POST['from_date']) ? $_POST['from_date'] : '2024-01-01'; 
$todate = isset($_POST['to_date']) ? $_POST['to_date'] : date('Y-m-d'); 
$type = isset($_POST['type']) ? $_POST['type'] : 'All'; 

// Get the owner's name
$result1 = "SELECT fname FROM customer WHERE login_id='$log'";
$sql1 = mysqli_query($conn, $result1);

if ($sql1 && mysqli_num_rows($sql1) > 0) {
    $data1 = mysqli_fetch_array($sql1);
} else {
    $data1['fname'] = 'Guest'; 
}
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
                    <span class="nav-link" style="pointer-events: none; color: #fff; text-decoration: none; background-color: transparent !important; cursor: default; ">Hello <?php echo htmlspecialchars($data['fname']); ?></span>
                    </li>
                    <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
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
                    <li class="nav-item active"><a href="report.php" class="nav-link">Report</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>



<section class="intro">
    <div class="bg-image h-100" style="background-color: #ffff;">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <br><br>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                            <div class="card-body">

                                <!-- Search Form -->
                                <form action="" method="POST">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <label for="from_date">From Date:</label>
                                            <input type="date" name="from_date" id="from_date" class="form-control" value="<?php echo htmlspecialchars($fromdate); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="to_date">To Date:</label>
                                            <input type="date" name="to_date" id="to_date" class="form-control" value="<?php echo htmlspecialchars($todate); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="property_type">Select Property:</label>
                                            <select id="type" name="type" class="form-control">
                                                <option value="All" <?php echo ($type == 'All') ? 'selected' : ''; ?>>--All--</option>
                                                <option value="House" <?php echo ($type == 'House') ? 'selected' : ''; ?>>House</option>
                                                <option value="PG/Room" <?php echo ($type == 'PG/Room') ? 'selected' : ''; ?>>PG/Room</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center" style="margin-top: 20px;">
                                        <div class="col-md-2">
                                            <button type="submit" name="search" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end" style="margin-top: 20px;">
                                        <div class="col-md-2">
                                            <a href="download_report.php?from_date=<?php echo htmlspecialchars($fromdate); ?>&to_date=<?php echo htmlspecialchars($todate); ?>&type=<?php echo htmlspecialchars($type); ?>" class="btn btn-success btn-block" style="float: right;">Download</a>
                                        </div>
                                    </div>

                                </div>
                                </form>
                               

                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">SLNo</th>
                                                <th scope="col">Room Details</th>
                                                <th scope="col">Customer Details</th>
                                                <th scope="col">Booking Details</th>
                                                <th scope="col">Booking ID</th>
                                                <th scope="col">Advance Amount</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>

                                        <?php
                                        $i = 1;

                                        
                                        if ($type == 'All') {
                                            // Show both House and PG/Room bookings for the owner
                                            $query = "
                                                SELECT 'House' as property_type, pg.pg_id as room_id, pg.pg_name as room_name, pg.pg_address as room_address, customer.*, booking.*, 
                                                (25 / 100) * (pg.pg_price * booking.stay) as advance_price, booking.book_status
                                                FROM booking
                                                JOIN customer ON booking.cus_id = customer.login_id
                                                JOIN add_pg as pg ON booking.room_id = pg.pg_id
                                                UNION ALL
                                                SELECT 'PG/Room' as property_type, room.room_no as room_id, room.room_sell as room_name, room.room_address as room_address, customer.*, booking.*, 
                                                (25 / 100) * (room.room_price * booking.stay) as advance_price, booking.book_status
                                                FROM booking
                                                JOIN customer ON booking.cus_id = customer.login_id
                                                JOIN add_room as room ON booking.room_id = room.room_no
                                                WHERE room.room_owner = '$log' AND booking.join_date >= '$fromdate' AND booking.join_date <= '$todate'";
                                        } elseif ($type == 'House') {
                                            // Show only House bookings for the owner
                                            $query = "
                                                SELECT 'House' as property_type, pg.pg_id as room_id, pg.pg_name as room_name, pg.pg_address as room_address, customer.*, booking.*, 
                                                (25 / 100) * (pg.pg_price * booking.stay) as advance_price, booking.book_status
                                                FROM booking
                                                JOIN customer ON booking.cus_id = customer.login_id
                                                JOIN add_pg as pg ON booking.room_id = pg.pg_id
                                                WHERE pg.pg_owner = '$log' AND booking.join_date >= '$fromdate' AND booking.join_date <= '$todate'";

                                        } else {
                                            // Show only PG/Room bookings for the owner
                                            $query = "
                                                SELECT 'PG/Room' as property_type, room.room_no as room_id, room.room_sell as room_name, room.room_address as room_address, customer.*, booking.*, 
                                                (25 / 100) * (room.room_price * booking.stay) as advance_price, booking.book_status
                                                FROM booking
                                                JOIN customer ON booking.cus_id = customer.login_id
                                                JOIN add_room as room ON booking.room_id = room.room_no
                                                WHERE room.room_owner = '$log' AND booking.join_date >= '$fromdate' AND booking.join_date <= '$todate'";
                                        }
                                        
                                        $result = mysqli_query($conn, $query);
                                        
                                        if (!$result) {
                                            die("Error executing query: " . mysqli_error($conn));
                                        }
                                        
                                        // Display results in the table
                                        
                                        while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><?php echo $i++; ?></th>
                                                    <td>
                                                        <?php if ($data['property_type'] == 'House') { ?>
                                                            House ID: <?php echo htmlspecialchars($data['room_id']); ?><br>
                                                            House Name: <?php echo htmlspecialchars($data['room_name']); ?><br>
                                                            House Address: <?php echo htmlspecialchars($data['room_address']); ?><br>
                                                        <?php } else { ?>
                                                            Room no: <?php echo htmlspecialchars($data['room_id']); ?><br>
                                                            Room Type: <?php echo htmlspecialchars($data['room_name']); ?><br>
                                                            Room Address: <?php echo htmlspecialchars($data['room_address']); ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        Name: <?php echo htmlspecialchars($data['fname']); ?><br>
                                                        Email: <?php echo htmlspecialchars($data['email']); ?><br>
                                                        Phno: <?php echo htmlspecialchars($data['phno']); ?><br>
                                                        Gender: <?php echo htmlspecialchars($data['gender']); ?><br>
                                                        Aadhaar: <?php echo htmlspecialchars($data['aadhar']); ?>
                                                    </td>
                                                    <td>
                                                        Join Date: <?php echo htmlspecialchars($data['join_date']); ?><br>
                                                        Due Date: <?php echo htmlspecialchars($data['due_date']); ?><br>
                                                        Stay Period: <?php echo htmlspecialchars($data['stay']); ?> Months
                                                    </td>
                                                    <td><?php echo htmlspecialchars($data['book_id']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['advance_price']); ?></td>
                                                    <td><?php echo htmlspecialchars($data['book_status']); ?></td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>