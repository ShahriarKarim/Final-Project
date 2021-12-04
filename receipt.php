<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Receipt Details</title>
        <style>
            .invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }

            /** RTL **/
            .rtl {
                direction: rtl;
                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }

            .rtl table {
                text-align: right;
            }

            .rtl table tr td:nth-child(2) {
                text-align: left;
            }

            .footer-brand {
                overflow: hidden;
            }

            .footer-brand:before {
                content: "";
                display: block;
                position: relative;
                background: #aa964c;
                box-shadow: 0px 8px 0px rgba(0, 0, 0, 0.1);
            }

            .footer-brand .footer-heading {
                position: relative;
                /* top: 0vmax;
                left: 1vmax; */
                padding: 0;
                margin: 0;
                color: #fff;
                font-size: 1em;
                font-family: "Lobster", cursive;
                text-shadow: 2px 2px 0px #6e5a11, 4px 4px 0px #836d24, 6px 6px 0px #a88616,
                    8px 8px 0px #b08909, 10px 10px 0px #ab995e;
            }
        </style>
        <script src="_.js "></script>
    </head> 
    <body>
        <div>
            <?php 

                include "connection.php";
                $db = mysqli_select_db($con, "cinema_db");
                
                $qry = "select * from bookingtable where ORDERID = '" . $_GET['id'] . "'";

                if ((!$_GET['id'])) {
                    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>"; 
                }
                
                $result = mysqli_query($con, $qry);
                if (mysqli_num_rows($result) = 0) {
                    echo "Not found, terminated.";
                    exit;
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $bookingid = $row['bookingID'];
                    $movieID = $row['movieID'];
                    $bookingFName = $row['bookingFName'];
                    $bookingLName = $row['bookingLName'];
                    $mobile = $row['bookingPNumber'];
                    $email = $row['bookingEmail'];
                    $date = $row['bookingDate'];
                    $theatre = $row['bookingTheatre'];
                    $type = $row['bookingType'];
                    $time = $row['bookingTime'];
                    $amount = $row['amount'];
                    $ORDERID = $row['ORDERID'];
                    $date = $row['DATE-TIME'];
                }
            ?>
        </div>
        <div class = "invoice-box">
            <table cellpadding = "0" cellspacing = "0">
                <tr class = "top">
                    <td colspan = "2">
                        <table>
                            <tr>
                                <td class = "title">
                                    <div class = "footer-brand">
                                        <h1 class = "footer-heading">
                                            OTU Cinema 
                                        </h1>
                                    </div>
                                </td>
                                <td>
                                    Order ID #: <?php echo $ORDERID; ?><br>
                                    Created: <?php date_default_timezone_set('America/Toronto');
                                             echo $date = DATE("d-m-y h:i:s", strtotime($date)); ?><br>
                                    Due: <?php echo "After 24 Hours, once covid vaccination is checked"; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class = "information">
                    <td colspan = "2">
                        <table>
                            <tr>
                                <td>
                                    OTU Cineama
                                    2000 Simcoe St N, Oshawa, ON L1G 0C5
                                </td>
                                <td>
                                    <?php echo $bookingFName." ".$bookingLName; ?><br>
                                    <?php echo $mobile; ?><br>
                                    <?php echo $email; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class = "heading">
                    <td>Payment Status</td>
                    <td>Check #</td>
                </tr>
                <tr class = "details">
                    <td>Succes</td>
                    <td><?php echo '$'.$amount; ?></td>
                </tr>
                <tr class = "heading">
                    <td>Movie Details</td>
                    <td>Information</td>
                </tr>
                <tr class = "item">
                    <td>Date</td>
                    <td><?php echo $date; ?></td>
                </tr>
                <tr class = "item">
                    <td>Theatre Location</td>
                    <td><?php echo $theatre; ?></td>
                </tr>
                <tr class = "item last">
                    <td>Genre</td>
                    <td><?php echo $type; ?></td>
                </tr>
                <!-- <tr class = "total">
                    <td></td>
                    <td></td>
                </tr> -->
            </table>
        </div>
        <div style="max-width: 300px; margin:auto; padding: 30px;">
            <input type="button" class="btn btn-danger" onClick="window.print()" value="Print Recipt!" />
            <a type="button" class="btn btn-success" href = "index.php">Home-Page</a>
        </div>
        <br>
    </body>
</html>