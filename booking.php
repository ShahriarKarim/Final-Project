<!DOCTYPE html>
<html lang = "en">

    <?php 

    $id = $_GET['id'];
    
    // conditions 
    if ((!$_GET['id'])) {
        echo "<script>
            alert('You are Not Suppose to come Here Directly');
            window.location.href='index.php';
        </script>"; 
    }

    include "connection.php";

    $movieQuery = "SELECT * FROM movieTable WHERE movieID = $id";
    $movieImageById = mysqli_query($con, $movieQuery);
    $row = mysqli_fetch_array($movieImageId);

    ?>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style/styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <title>Booking for: <?php echo $row['movieTitle']; ?></title>
        <link rel="icon" type="image/png" href="img/logo.png"> 
        <script src="_.js "></script> // NEEDS TO BE ADDED SOMEHOW
    </head>

    <body style="background-color:#00BFFF;">
        <div class = "booking-panel">
            <div class = "booking-panel-section booking-panel-section1">
                <h1>Ticket Reservation</h1>
            </div>
            <div class = "booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
                <i class="fas fa-2x fa-times"></i>
            </div>
            <div class = booking-panel-section booking-panel-section3>
                <div class = "movie-box">
                    ?php
                        echo '<img src="' . $row['movieImg'] . '" alt="">';
                    ?>
                </div>
            </div>
            <div class="booking-panel-section booking-panel-section4">
                <div class="title"><?php echo $row['movieTitle']; ?></div>
                <div class = "movie-information">
                    <table>
                        <tr>
                            <td>Genre</td>
                            <td><?php echo $row['movieGenre']; ?></td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td><?php echo $row['moveDuration']; ?></td>
                        </tr>
                        <tr>
                            <td>Release Date</td>
                            <td><?php echo $row['movieRelDate']; ?></td>
                        </tr>
                        <tr>
                            <td>Director</td>
                            <td><?php echo $row['movieDirector']; ?></td>
                        </tr>
                        <tr>
                            <td>Actors</td>
                            <td><?php echo $row['movieActors']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class = "booking-form-container">
                    <form action = "verify.php" method = "POST">

                        <select name = "theatre" required>
                            <option value="" disabled selected>Theatre</option>
                            <option value="main-hall">Main Hall</option>
                            <option value="vip-hall">VIP Hall</option>
                            <option value="private-hall">Private Hall</option>
                        </select>
                        
                        <select name="type" required>
                            <option value="" disabled selected>Type</option>
                            <option value="3d">3D</option>
                            <option value="2d">2D</option>
                            <option value="imax">IMAX</option>
                            <option value="7d">7D</option>
                        </select>

                        <select name = "date" required>
                            <option value="" disabled selected>Date</option>
                            <option value="6-12">December 6,2021</option>
                            <option value="7-12">December 7,2021</option>
                            <option value="8-12">December 8,2021</option>
                            <option value="9-12">December 9,2021</option>
                            <option value="10-12">December 10,2021</option>
                        </select>

                        <select name = "hour" required>
                            <option value="" disabled selected>Time</option>
                            <option value="09-00">09:00 AM</option>
                            <option value="12-00">12:00 AM</option>
                            <option value="15-00">03:00 PM</option>
                            <option value="18-00">06:00 PM</option>
                            <option value="21-00">09:00 PM</option>
                            <option value="24-00">12:00 PM</option>
                        </select>

                        <input placeholder="First Name" type = "text" name = "fName" required>
                        <input placeholder="Last Name" type = "text" name = "lName" required>
                        <input placeholder="Phone Number" type = "text" name = "pNumber" required>
                        <input placeholder="Email" type = "email" name = "email" required>
                        <input type = "hidden" name = "movie_id" value = "<?php echo $id; ?>">

                        <button type="submit" value="save" name="submit" class="form-btn">Book Seat!</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script src="scripts/jquery-3.3.1.min.js "></script> -->
        <script src="scripts/script.js "></script>
    </body>
</html>
