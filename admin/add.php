<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add entry</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<style>
    #BannerSpace {
    height: 60px;
    opacity: 0%;
    }
</style>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "cinema_db");
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($link, $sql));
    ?>

    <?php include('header.php'); ?>
    
    <div class="admin-container">

        <?php include('sidebar.php'); ?>

        <div class="admin-section admin-section2">

            <div class="container-lg">
                <div id=BannerSpace></div>
                <div class="col-lg-8">
                    <div class="admin-section-stats">
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                        </div>
                        <div class="admin-section-stats-panel" style="border: none">
                            <i class="fa fa-ticket-alt" style="background-color: #cf4545"></i>
                            <h2 style="color: #cf4545"><?php echo $bookingsNo ?></h2>
                            <h3>Bookings</h3>
                        </div>
                        <div class="admin-section-stats-panel" style="border: none" width="100%">
                        </div>
                    </div>
                </div>

                <div id=BannerSpace></div>
                <div class="admin-section-column">
                    <div class="admin-section-panel admin-section-panel2">

                        <div class="admin-panel-section-header">
                            <h2 style="color: #cf4545">ADD ENTRY</h2>
                            <i class="fas fa-film" style="background-color: #cf4545"></i>
                        </div>
                        
                        <div class="booking-form-container" style="background-color: #cf4545">
                            <form action="spot.php" method="POST">
                        
                                <select name="theatre" style="background-color: white" required >
                                    <option value="" disabled selected>THEATRE</option>
                                    <option value="main-hall">Main Hall</option>
                                    <option value="vip-hall">VIP Hall</option>
                                    <option value="private-hall">Private Hall</option>
                                </select>

                                <select name="type" style="background-color: white" required>
                                    <option value="" disabled selected>TYPE</option>
                                    <option value="3d">3D</option>
                                    <option value="2d">2D</option>
                                    <option value="imax">IMAX</option>
                                    <option value="7d">4DX</option>
                                </select>

                                <select name="date" style="background-color: white" required>
                                    <option value="" disabled selected>DATE</option>
                                    <option value="6-12">December 6, 2021</option>
                                    <option value="7-12">December 7, 2021</option>
                                    <option value="8-12">December 8, 2021</option>
                                    <option value="9-12">December 9, 2021</option>
                                    <option value="10-12">December 10, 2021</option>
                                </select>

                                <select name="hour" style="background-color: white" required>
                                    <option value="" disabled selected>TIME</option>
                                    <option value="09-00">09:00 AM</option>
                                    <option value="12-00">12:00 AM</option>
                                    <option value="15-00">03:00 PM</option>
                                    <option value="18-00">06:00 PM</option>
                                    <option value="21-00">09:00 PM</option>
                                    <option value="24-00">12:00 PM</option>
                                </select>

                                <input placeholder="First Name" type="text" name="fName" required>
                                <input placeholder="Last Name" type="text" name="lName">
                                <input placeholder="Phone Number" type="text" name="pNumber" required>
                                <input placeholder="Email" type="email" name="email" required>
                                <input placeholder="Movie ID" type="text" name="movie_id">
                                <input placeholder="Amount" type="text" name="cash" required>

                                <button type="submit" value="submit" name="submit" class="form-btn" style="background-color: #bd2222">ADD ENTRY</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>
</html>