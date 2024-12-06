<?php
include 'header.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Cosmo<span>Rentals</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <!-- Uncomment or add other nav items as needed -->
                <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="rooms.html" class="nav-link">Apartment Room</a></li> -->
                <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Users</a>
                    <div class="dropdown-menu">
                        <a href="customer.php" class="dropdown-item">CUSTOMER</a>
                        <a href="owner.php" class="dropdown-item">OWNER</a>
                    </div>
                </li>
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">ID Proof</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Confirm</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../connection.php';
                                            $result = "SELECT * FROM owner";
                                            $sql = mysqli_query($conn, $result);
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['reg_id']; ?></td>
                                                <td><?php echo $data['fname']; ?></td>
                                                <td><?php echo $data['email']; ?></td>
                                                <td><?php echo $data['phno']; ?></td>
                                                <td><?php echo $data['owner_address']; ?></td>
                                                <td><img src="../images/<?php echo $data['id_proof']; ?>" width="250px" alt="ID Proof"></td>
                                                <td>
                                                    State : <?php echo $data['owner_state']; ?>
                                                    <br>District : <?php echo $data['district']; ?>
                                                    <br>City : <?php echo $data['city']; ?>
                                                </td>
                                                <td>
                                                <div class="d-flex flex-row align-items-center">
                                                      <a href="approve.php?id=<?php echo $data['login_id']; ?>">
                                                          <button type="button" class="btn btn-success btn-sm">Approve</button>
                                                      </a>
                                                      <div class="divider mx-2"></div>
                                                      <a href="reject.php?id=<?php echo $data['login_id']; ?>">
                                                          <button type="button" class="btn btn-danger btn-sm">Reject</button>
                                                      </a>
                                                  </div>

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

<?php
include 'footer.php';
?>

<style>
.divider {
    border-left: 1px solid #ddd;
    height: 24px; /* Adjust based on button height */
}
</style>

