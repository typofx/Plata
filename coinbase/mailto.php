<?php

    $emailSubject = "Trading Plata Token from Coinbase Commerce";

    $paymentAmount = $_GET['amount'];
    $paymentCurrency = $_GET['currency'];
    $customerName = $_GET['customerName'];
    $customerEmail = $_GET['customerEmail'];
    $web3wallet = $_GET['customerWallet'];
    $PLTwanted = $_GET['PLTwanted'];
    
    if ($customerEmail == "") {
        echo '<script language="Javascript1.1">window.close();</script>';
        die();
        }
    
    $headers = "From: noreply@plata.ie";
  
    //$identificador = $_POST['identificador'];
    //$PLTwanted = number_format($_POST["PLTwanted"], 4, '.' , ',');
    $TXTdate = $_POST["TXTdate"]; 
    
    date_default_timezone_set('UTC');
    $date = date("H:i:s T d/m/Y");
    $Expdate = strtotime(date("H:i:s"))+3600;//60*60=3600 seconds
    $Expdate = date("H:i:s d/m/Y (T)",$Expdate);

    $emailMessage = 
                    "User's Email: ".$customerEmail."\n"."\n".
                    "Order Opened at : " . $date ."\n".
                    "Transaction costs (".$paymentCurrency.") : ".$paymentAmount."\n".
                    "Receives About (PLT) : ".$PLTwanted."\n".
                    "Web3 Wallet : ". $web3wallet."\n".
                    "Chain ID : Polygon (137)"."\n".
                    //"Identificador : ". $identificador."\n".
                    "Order Expires at : ". $Expdate
                  ;

  mail($customerEmail, $emailSubject, $emailMessage, $headers);
  mail('salesdone@plata.ie', $emailSubject, $emailMessage, $headers);
  mail('uarloque@live.com', $emailSubject, $emailMessage, $headers);
  
echo '<body><script language="Javascript1.1">window.close();

function openTab(){

setTimeout (function closeTab(){

closeWindow.close();

},100);

} closeTab();

</script><body>';

?>