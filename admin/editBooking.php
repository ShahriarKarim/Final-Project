<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Booking</title>
    <style>
        .booking-form-containerss{
            background-color: #cf4545;
  width: 100%;
  padding: 25px;
  margin: 20px 0;
        }
        </style>
</head>

<body>
<?php

include "config.php";
$id = $_GET['id']; // get id through query string
$setting = "select * from bookingtable where bookingID='$id'";
$qry = mysqli_query($con, $setting); // select query

$data = mysqli_fetch_array($qry); // fetch data

if (isset($_POST['update'])) // when click on Update button
{
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $phone = $_POST['number'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    $edit = mysqli_query($con, "update bookingtable set bookingFName='$firstname', bookingLName='$lastname',bookingPNumber='$phone',bookingEmail='$email',amount='$amount' where bookingID='$id'");

    if ($edit) {
        mysqli_close($con); // Close connection
        header("location:view.php"); // redirects to all records page
        exit;
    } else {
        echo "error";
    }
}
?>

    <?php include('header.php'); ?>

    <div class="admin-container">
        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>UPDATE DATA</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-containerss">
                        <form method="POST">
                            <table>
                            <tr>
                                <th>First Name: </th>
                            <th><input type="text" name="first" size= "100"value="<?php echo $data['bookingFName'] ?>" placeholder="Enter First Name" Required>
                            </th>
                            </tr>
                            <tr>
                                <th>Last Name: </th>
                            <th>
                                <input type="text" name="last" value="<?php echo $data['bookingLName'] ?>" placeholder="Enter Last Name" Required>
                            </th>
                            </tr>
                            <tr>
                                <th>Phone Number: </th>
                            <th>
                            <input type="text" name="number" value="<?php echo $data['bookingPNumber'] ?>" placeholder="Enter Last Name" Required>
                            </th>
                            </tr>
                            <tr>
                                <th>Email: </th>
                            <th>
                            <input type="text" name="email" value="<?php echo $data['bookingEmail'] ?>" placeholder="Enter Age" Required>
                            </th>
                            </tr>
                            <tr>
                                <th>Paid Amount: </th>
                            <th>
                            <input type="text" name="amount" value="<?php echo $data['amount'] ?>" placeholder="Enter Amount" Required>
                            </th>
                            <th><input type="submit" name="update" style="height:50px; width:150px" class="form-btn" value="Update"></th>
                            </tr>
                            </table>
                             
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    
</body>

</html>