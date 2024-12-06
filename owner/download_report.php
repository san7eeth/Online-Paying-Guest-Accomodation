<?php
include '../connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$log = $_SESSION['login_id'];

$fromdate = isset($_GET['from_date']) ? $_GET['from_date'] : '2024-01-01';
$todate = isset($_GET['to_date']) ? $_GET['to_date'] : date('Y-m-d');
$type = isset($_GET['type']) ? $_GET['type'] : 'All';


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=booking_report.xls");
header("Pragma: no-cache");
header("Expires: 0");


echo "SL No\tRoom ID\tRoom Name\tRoom Address\tCustomer Name\tCustomer Email\tPhone Number\tGender\tAadhaar\tBooking ID\tJoin Date\tDue Date\tStay Period (Months)\tAdvance Amount\tStatus\n";


if ($type == 'All') {
    $query = "
        SELECT 'House' as property_type, pg.pg_id as room_id, pg.pg_name as room_name, pg.pg_address as room_address, customer.*, booking.*, 
        (25 / 100) * (pg.pg_price * booking.stay) as advance_price, booking.book_status
        FROM booking
        JOIN customer ON booking.cus_id = customer.login_id
        JOIN add_pg as pg ON booking.room_id = pg.pg_id
        WHERE pg.pg_owner = '$log' AND booking.join_date >= '$fromdate' AND booking.join_date <= '$todate'
        UNION ALL
        SELECT 'PG/Room' as property_type, room.room_no as room_id, room.room_sell as room_name, room.room_address as room_address, customer.*, booking.*, 
        (25 / 100) * (room.room_price * booking.stay) as advance_price, booking.book_status
        FROM booking
        JOIN customer ON booking.cus_id = customer.login_id
        JOIN add_room as room ON booking.room_id = room.room_no
        WHERE room.room_owner = '$log' AND booking.join_date >= '$fromdate' AND booking.join_date <= '$todate'";
} elseif ($type == 'House') {
    $query = "
        SELECT pg.pg_id as room_id, pg.pg_name as room_name, pg.pg_address as room_address, customer.*, booking.*, 
        (25 / 100) * (pg.pg_price * booking.stay) as advance_price, booking.book_status
        FROM booking
        JOIN customer ON booking.cus_id = customer.login_id
        JOIN add_pg as pg ON booking.room_id = pg.pg_id
        WHERE pg.pg_owner = '$log' AND booking.join_date >= '$fromdate' AND booking.join_date <= '$todate'";
} else {
    $query = "
        SELECT room.room_no as room_id, room.room_sell as room_name, room.room_address as room_address, customer.*, booking.*, 
        (25 / 100) * (room.room_price * booking.stay) as advance_price, booking.book_status
        FROM booking
        JOIN customer ON booking.cus_id = customer.login_id
        JOIN add_room as room ON booking.room_id = room.room_no
        WHERE room.room_owner = '$log' AND booking.join_date >= '$fromdate' AND booking.join_date <= '$todate'";
}

$result = mysqli_query($conn, $query);

if ($result) {
    $i = 1;
    while ($data = mysqli_fetch_array($result)) {
        $room_details = $data['room_id'] . "\t" . $data['room_name'] . "\t" . $data['room_address'];
        $customer_details = $data['fname'] . "\t" . $data['email'] . "\t" . $data['phno'] . "\t" . $data['gender'] . "\t" . $data['aadhar'];
        $booking_details = $data['book_id'] . "\t" . $data['join_date'] . "\t" . $data['due_date'] . "\t" . $data['stay'];
        
        
        echo "$i\t$room_details\t$customer_details\t$booking_details\t" . $data['advance_price'] . "\t" . $data['book_status'] . "\n";
        $i++;
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}
?>
