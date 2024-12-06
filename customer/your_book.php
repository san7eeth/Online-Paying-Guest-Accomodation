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
            $result = "SELECT fname FROM customer WHERE login_id='$log' ";
            $sql = mysqli_query($conn, $result);
            $data = mysqli_fetch_array($sql);
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"> <span class="nav-link">Hello <?php echo $data['fname']; ?></span></li>
                <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="#" class="nav-link">Your Bookings</a></li>
                <li class="nav-item"><a href="cus_edit.php" class="nav-link">Edit Profile</a></li>
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
                                                <th scope="col"></th>
                                                <th scope="col">SLNo</th>
                                                <th scope="col">Booking Details</th>
                                                <th scope="col">Owner/Manager Details</th>
                                                <th scope="col">Booking ID</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../connection.php';

                                            // Fetch all bookings for the logged-in user
                                            $booking_query = "SELECT * FROM booking WHERE cus_id = $log";
                                            $booking_result = mysqli_query($conn, $booking_query);
                                            $i = 1;

                                            while ($booking_data = mysqli_fetch_array($booking_result)) {
                                                // Check if booking is for house or room
                                                if ($booking_data['type'] == 'house') {
                                                    // Query to get house details
                                                    $house_query = "SELECT * FROM add_pg, owner WHERE owner.login_id=add_pg.pg_owner AND add_pg.pg_id = " . $booking_data['room_id'];
                                                    $house_result = mysqli_query($conn, $house_query);
                                                    $house_data = mysqli_fetch_array($house_result);
                                                    ?>
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td><?php echo $i++; ?></td>
                                                        <td>
                                                            <?php echo "House name: " . $house_data['pg_name'] . '<br>' . "House Address: " . $house_data['pg_address']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "Name: " . $house_data['fname'] . '<br>' . "Contact: " . $house_data['phno']; ?>
                                                        </td>
                                                        <td><?php echo $booking_data['book_id']; ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($booking_data['book_status']) {
                                                                case 'Approved':
                                                                    echo '<span style="color: green;">Approved</span>'; ?>
                                                                    <div class="button-group">
                                                                        <a href="payment.php?id=<?php echo $booking_data['book_id'] ?>&&price=<?php echo $house_data['pg_price'] ?>">
                                                                            <button type="button" class="btn btn-primary btn-sm">Proceed</button>
                                                                        </a>
                                                                    </div>
                                                                    <?php break;
                                                                case 'Rejected':
                                                                    echo '<span style="color: red;">Rejected</span>';
                                                                    break;
                                                                case 'pending':
                                                                    echo '<span style="color: orange;">Pending</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span style="color: black;">Booked</span>';
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } elseif ($booking_data['type'] == 'room') {
                                                    $room_query = "SELECT * FROM add_room WHERE room_no = " . $booking_data['room_id'];
                                                    $room_result = mysqli_query($conn, $room_query);
                                                    $room_data = mysqli_fetch_array($room_result); ?>
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo "Room no: " . $room_data['room_no'] . '<br>' . "Room Type: " . $room_data['room_sell'] . '<br>' . "Room Address: " . $room_data['room_address']; ?></td>
                                                        <td><?php echo "Name: " . $room_data['manage_name'] . '<br>' . "Contact: " . $room_data['manage_no']; ?></td>
                                                        <td><?php echo $booking_data['book_id']; ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($booking_data['book_status']) {
                                                                case 'Approved':
                                                                    echo '<span style="color: green;">Approved<br></span>'; ?>
                                                                    <div class="button-group">
                                                                        <a href="payment.php?id=<?php echo $booking_data['book_id'] ?>&&price=<?php echo $room_data['room_price'] ?>">
                                                                            <button type="button" class="btn btn-primary btn-sm">Proceed</button>
                                                                        </a>
                                                                    </div>
                                                                    <?php break;
                                                                case 'Rejected':
                                                                    echo '<span style="color: red;">Rejected</span>';
                                                                    break;
                                                                case 'pending':
                                                                    echo '<span style="color: orange;">Pending</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span style="color: black;">Booked</span>';
                                                                    break;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</section>

<style>
    .table-bordered {
        width: 100%;
        border-collapse: collapse;
    }

    .table-bordered th, .table-bordered td {
        padding: 8px 12px;
        text-align: left;
        border: 1px solid #dee2e6;
    }

    .table-bordered th {
        background-color: #f8f9fa;
        text-align: center;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        border-radius: 0.2rem;
    }

    .button-group {
        display: flex;
        gap: 10px; 
    }

    
    .table-responsive {
        padding: 20px;
    }
</style>

<?php
include 'footer.php';
?>
