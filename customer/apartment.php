<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartment</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 10px;
    }

    h4 {
      font-size: 1rem;
      margin-bottom: 10px;
    }

    .center {
      margin-top: 20px;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 10px;
    }

    .table-container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin: 30px;
    }

    .about {
      margin: 40px;
    }

    button {
  position: relative;
  background-color: rgb(230, 34, 77);
  border-radius: 5px;
  padding: 15px;
  background-repeat: no-repeat;
  cursor: pointer;
  box-sizing: border-box;
  width: 154px;
  height: 49px;
  color: #fff;
  border: none;
  font-size: 20px;
  transition: all 0.3s ease-in-out;
  z-index: 1;
  overflow: hidden;
}

button::before {
  content: "";
  background-color: rgb(248, 50, 93);
  width: 0;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: width 700ms ease-in-out;
  display: inline-block;
}

button:hover::before {
  width: 100%;
}

  </style>
</head>
<body>
  <?php include "header.php"; ?>
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2>Apartment Details</h2>
          <span class="subheading">Apartments &amp; Rooms</span>
        </div>
      </div>
      <div class="row d-flex">
        <?php
        if (isset($_GET['pg_id'])) {
          $pg_id = intval($_GET['pg_id']);
          include '../connection.php';
          $result = "SELECT * FROM add_pg WHERE pg_id=$pg_id";
          $sql = mysqli_query($conn, $result);
          if ($sql && mysqli_num_rows($sql) > 0) {
            while ($data = mysqli_fetch_array($sql)) {
        ?>
               <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch" style="height:auto; width: 100%; align-items:center;">
                  <a href="blog-single.html" class="block-20 rounded" style="background-image: url('images/<?php echo $data['pg_img']; ?>'); height:500px;">
                  </a>
                  <center><h2><?php echo $data['pg_name']; ?></h2></center>
                  <div class="table-container">
                    <div class="col-lg-12">
                      <table>
                        <h4>Details</h4>
                        <tr>
                          <td>State</td>
                          <td><?php echo $data['pg_state']; ?></td>
                        </tr>
                        <tr>
                          <td>District</td>
                          <td><?php echo $data['pg_district']; ?></td>
                        </tr>
                        <tr>
                          <td>City</td>
                          <td><?php echo $data['pg_city']; ?></td>
                        </tr>
                        <tr>
                          <td>Rent per Month</td>
                          <td><?php echo $data['pg_price']; ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-lg-12">
                      <table>
                        <h4>Facilities</h4>
                        <tr>
                          <td>Bedroom</td>
                          <td><?php echo $data['pg_bedroom']; ?></td>
                        </tr>
                        <tr>
                          <td>Bathroom</td>
                          <td><?php echo $data['pg_bathroom']; ?></td>
                        </tr>
                        <tr>
                          <td>Kitchen</td>
                          <td><?php echo $data['pg_kitchen']; ?></td>
                        </tr>
                        <tr>
                          <td>Furnishing</td>
                          <td><?php echo $data['pg_furnishing']; ?></td>
                        </tr>
                        <tr>
                          <td>Parking</td>
                          <td><?php echo $data['pg_parking']; ?></td>
                        </tr>
                        <tr>
                          <td>Wifi</td>
                          <td><?php echo $data['pg_wifi']; ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-lg-12">
                      <table>
                      <tr>
                          <video width ="450" controls>
                            <source src="../images/<?php echo $data['pg_vid'];?>" height="500" width="500" type="video/mp4">
                          </video>
                        </tr>
                      </table>
                    </div>

                  </div>
                  <div class="about">
                    <h3>Description</h3>
                    <p><?php echo $data['pg_description']; ?></p>
                  </div>
                  <a href ="book.php?id=<?php echo $_GET['pg_id']?>&type=house""><center><button style="margin-bottom: 40px;">Book Now</button></center></a>
                </div>
              </div>
        <?php
            }
          } else {
            echo "<p>No details found for the specified apartment.</p>";
          }
        } else {
          echo "<p>No apartment ID specified.</p>";
        }
        ?>
      </div>
    </div>
  </section>
  <?php include "footer.php"; ?>
</body>
</html>
