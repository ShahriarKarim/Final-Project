<?php

    include "connection.php";
    session_start();

    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $email = $_POST['email'];
    $mobile = $_POST['pNumber'];
    $theatre = $_POST['theatre'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $time = $_POST['hour'];
    $movieid = $_POST['movie_id'];
    $order = "ARVR" . rand(10000, 99999999);
    $cust  = "CUST" . rand(1000, 999999);


    if ((!$_POST['submit'])) {
        echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
    }

    if (isset($_POST['submit'])) {

        $qry = "INSERT INTO bookingtable(`movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`, `bookingEmail`,`amount`, `ORDERID`)
        VALUES ('$movieid','$theatre','$type','$date','$time','$fname','$lname','$mobile','$email','Not Paid','$order')";

        $result = mysqli_query($con, $qry);
    }
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Movie Verification</title>
        <script src="_.js "></script>
    </head>
    <body>
        <center>
            <br><br>
            <h1>Ticket Booking Information</h1>
            <br><br>

            <form method = "POST" action = "pgRedirect.php">
                <table border = "1" style = "text-align: center;">
                    <tbody>

                        <tr>
                            <th>Line Item</th>
                            <th>Label</th>
                            <th>Value</th>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td><label>Order_ID</label></td>
                            <td>
                                <?php echo $order; ?>
                                <input type = "hidden" name = "ORDER_ID" value = "<?php echo $order ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td><label>Name</label></td>
                            <td>
                                <?php echo $_POST['fName']." ".$_POST['lName']; ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td><label>Purchase Site</label>
                                <?php echo "www.OTUCinema.com"; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td><label>Theatre</label></td>
                            <td>
                                <?php echo $_POST['theatre']; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td><label>Type</label></td>
                            <td>
                                <?php echo $_POST['type']; ?>                                
                            </td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td><label>Tax Amount</label></td>
                            <td>
                                <?php 
                                    if ($theatre == "main-hall") {
                                        $ta = 200;
                                    }
                                    if ($theatre == "vip-hall") {
                                        $ta = 500; 
                                    }
                                    if ($theatre == "private-hall") {
                                        $ta = 900;
                                    }
                                ?>

                                <input type = "text" name = "TXN_AMOUNT" value = "<?php echo $ta; ?>" >
                                <input type = "hidden" name = "CUST_ID" value = "<?php echo $cust ?>" >
                                <input type = "hidden" name = "INDUSTRY_TYPE_ID" value = "reatil" >
                                <input type = "hidden" name = "CHANNEL_ID" value = "WEB" >                                
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button value = "Book Now!" type = "submit" onclick = "" type = "button" class = "btn btn-danger">Confirm and Pay</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </center>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
