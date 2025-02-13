<?php 

    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");

    require_once("./payment/config_paytm.php");
    require_once("./payment/encdec_paytm.php"); 

    $checkSum = "";
    $paramList = array();

    $ORDER_ID = $_POST["ORDER_ID"];
    $CUST_ID = $_POST["CUST_ID"];
    $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
    $CHANNEL_ID = $_POST["CHANNEL_ID"];
    $TXN_AMOUNT = $_POST["TXN_AMOUNT"];

    $paramList["MID"] = PAYTM_MERCHANT_MID;
    $paramList["ORDER_ID"] = $ORDER_ID;
    $paramList["CUST_ID"] = $CUST_ID;
    $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
    $paramList["CHANNEL_ID"] = $CHANNEL_ID;
    $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
    $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
    $paramList["CALLBACK_URL"] = "http://localhost/pgResponse.php";

    $checkSum = getChecksumFromArray($paramList, PAYTM_MERCHANT_KEY);

?>

<html>
    <head>
        <title>Customer Checkout</title>
        <script src = "_.js"></script>
    </head>
    <body>
        <center>
            <form method = "post" action = "<?php echo PAYTM_TXN_URL ?>" name = "f1">
                <table border = "1">
                        <tbody>
                            <?php
                                foreach ($paramList as $name => $value) {
                                    echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
                                }
                            ?>
                            <input type = "hidden" name = "CHECKSUMHASH" value = "<?php echo $checkSum ?>">
                        </tbody>
                </table>
                <script type="text/javascript">
			        document.f1.submit();
		        </script>
            </form>
        </center>
    </body>
</html>