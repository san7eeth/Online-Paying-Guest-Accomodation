<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_pg";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $pg_type = $_POST['pg_type'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $city = $_POST['city'];

    // Prepare SQL query based on selected options
    if ($pg_type == "Room") {
        $sql = "SELECT room_no as room_name, room_address as room_address, room_description as room_description, room_img as room_img FROM add_room WHERE room_sell='room-wise' AND  ";
        $state_column = "room_state";
        $district_column = "room_district";
        $city_column = "room_city";
    }
    elseif ($pg_type == "PG") {
        $sql = "SELECT room_no as roompg_name, room_address as roompg_address, room_description as roompg_description, room_img as roompg_img FROM add_room WHERE room_sell='bed-wise' AND ";
        $state_column = "room_state";
        $district_column = "room_district";
        $city_column = "room_city";
     }
      elseif ($pg_type == "House") {
        $sql = "SELECT pg_name as pg_name,pg_id as pg_id, pg_address as pg_address, pg_description as pg_description, pg_img as pg_img FROM add_pg WHERE ";
        $state_column = "pg_state";
        $district_column = "pg_district";
        $city_column = "pg_city";
    } else {
        die("Invalid pg_type specified");
    }

    // Add conditions for state, district, city
    $conditions = [];
    if (!empty($state)) {
        $conditions[] = "$state_column = '$state'";
    }
    if (!empty($district)) {
        $conditions[] = "$district_column = '$district'";
    }
    if (!empty($city)) {
        $conditions[] = "$city_column = '$city'";
    }

    // Combine conditions with AND
    if (!empty($conditions)) {
        $sql .= implode(" AND ", $conditions);
    }

    // Execute query
    $result = $conn->query($sql);

    // Check for errors in query execution
    if (!$result) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        // Display results
        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
                    echo "<ul>";
            echo "<div class='row'>";
            while ($row = $result->fetch_assoc()) {



                // if ($result->num_rows > 0) {
                //     echo "<h2>Search Results:</h2>";
                //     echo "<ul>";
                //     while ($row = $result->fetch_assoc()) {
                //         // Display each result item as per your requirement
                //         echo "<li>";
                //         echo "Name: " . $row['pg_name'] . "<br>";
                //         echo "Address: " . $row['address'] . "<br>";
                //         // Add more fields as needed
                //         echo "</li>";
                //     }
                //     echo "</ul>";
                // } else {
                //     echo "No results found.";
                // }
        

                // Display each result item in the desired HTML format
                // echo "<div class='col-md-4 d-flex services align-self-stretch px-4 ftco-animate'>";
                // echo "<div class='d-block services-wrap text-center'>";
                // echo "<div class='img' style='background-image: url(../images/" . $row['img'] . ");'></div>";
                // echo "<div class='media-body py-4 px-3'>";
                // echo "<h3 class='heading'>" . $row['name'] . "</h3>";
                // echo "<p>" . $row['description'] . "</p>";
                // Adjust link based on pg_type
                if ($pg_type == "Room") {


                    $room_id=$row['room_name'];
        $disp="SELECT * FROM booking WHERE room_id=$room_id AND (book_status='Booked with cash' OR book_status='Booked with Online Payment') ";
        $show=mysqli_query($conn,$disp);
        if( mysqli_num_rows($show)>0)
       {
        continue;
       }
       else{

                    // Display each result item in the desired HTML format
                   
                echo "<div class='col-md-4 d-flex services align-self-stretch px-4 ftco-animate'>";
                echo "<div class='d-block services-wrap text-center'>";
                echo "<div class='img' style='background-image: url(../images/" . $row['room_img'] . ");'></div>";
                echo "<div class='media-body py-4 px-3'>";
                echo "<h3 class='heading'>" . $row['room_name'] . "</h3>";
                echo "<p>" . $row['room_description'] . "</p>";
                echo "<p><a href='room.php?room_no=" . $row['room_name'] . "' class='btn btn-primary'>View Room Details</a></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                    

                }} elseif ($pg_type == "PG"){

                        // Display each result item in the desired HTML format
                   
                echo "<div class='col-md-4 d-flex services align-self-stretch px-4 ftco-animate'>";
                echo "<div class='d-block services-wrap text-center'>";
                echo "<div class='img' style='background-image: url(../images/" . $row['roompg_img'] . ");'></div>";
                echo "<div class='media-body py-4 px-3'>";
                echo "<h3 class='heading'>" . $row['roompg_name'] . "</h3>";
                echo "<p>" . $row['roompg_description'] . "</p>";
                echo "<p><a href='room.php?room_no=" . $row['roompg_name'] . "' class='btn btn-primary'>View Room Details</a></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                }
                 elseif ($pg_type == "House") {


                    $room_id=$row['pg_id'];
                  $disp="SELECT * FROM booking WHERE room_id=$room_id AND (book_status='Booked with cash' OR book_status='Booked with Online Payment') ";
                  $show=mysqli_query($conn,$disp);
                  if( mysqli_num_rows($show)>0)
                 {
                  continue;
                 }
                 else{
                      // Display each result item in the desired HTML format
                   
                echo "<div class='col-md-4 d-flex services align-self-stretch px-4 ftco-animate'>";
                echo "<div class='d-block services-wrap text-center'>";
                echo "<div class='img' style='background-image: url(../images/" . $row['pg_img'] . ");'></div>";
                echo "<div class='media-body py-4 px-3'>";
                echo "<h3 class='heading'>" . $row['pg_name'] . "</h3>";
                echo "<p>" . $row['pg_description'] . "</p>";
                echo "<p><a href='apartment.php?pg_id=" . $row['pg_id'] . "' class='btn btn-primary'>View PG Details</a></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                }}
            
            }
            echo "</div>";
        } else {
            echo "No results found.";
        }

        // Free result set
        $result->free_result();
    }
}

// Close connection
$conn->close();
?>

