<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta charset="utf-8">
    <meta name="keywords" content="Base Information, ​Countdown $PLT Airdrop ends in, The Project, Do you need more information?, The Roadmap, Meet The Team, ​Best Wallets For $PLT Plata">
    <meta name="description" content="">
    
    <title>Token Price Converter</title>

    <link rel="stylesheet" href="https://www.plata.ie/en/mobile/mobile-index-style.css" media="screen">
    <link rel="stylesheet" href="https://www.plata.ie/en/mobile/mobile-header-style.css" media="screen">
    <link rel="stylesheet" href="https://www.plata.ie/en/mobile/mobile-sand-menu.css" media="screen">
    
    <link rel="stylesheet" href="https://www.plata.ie/en/mobile/mobile-main-style.css" media="screen">
    <link rel="stylesheet" href="https://www.plata.ie/en/mobile/mobile-button-style.css" media="screen">

    <link rel="stylesheet" href="https://www.plata.ie/en/mobile/mobile-listing-style.css" media="screen">

    <script class="u-script" type="text/javascript" src="https://www.plata.ie/copyContract.js"></script>
</head>

<body>

<body>
<br>
<center><h3>Token Price Converter</h3></center>

<div id="form" class="card-body">

    <div>
        <label for="PLTvalue" class="form-label">Plata (PLT)</label>
        <input type="number" id="PLTvalue" name="PLTvalue" size="15" value="<?php echo $PLTUSD?>" maxlength="13" min="0.000001" onkeyup="PLTexec()"  onkeypress="PLTexec()" onclick="this.select();" onkeypress="mascara(this,reais);PLTexec()" onfocusout="zero()" required>
        
    </div>

    <div>
        <label for="USDvalue" class="form-label">US Dollar (USD)</label>
        <input type="number" id="USDvalue" name="USDvalue" value ="1.00" size="15" maxlength="13" min="0.01" onkeyup="exec()" onkeypress="exec()" onclick="this.select();" onfocusout="zero()" required>

    </div>
    
    <div>
        <label for="MATICvalue" class="form-label">MATIC</label>
        <input type="number" id="MATICvalue" name="MATICvalue" size="15" maxlength="13" min="0.00001" onkeyup="MATICexec()" onkeypress="MATICexec()" onclick="this.select();" required>
    </div>

    <div>
        <label for="ETHvalue" class="form-label">Ethereum (ETH)</label>
        <input type="number" id="ETHvalue" name="ETHvalue" size="15" maxlength="13" min="0.000000001" onkeyup="ETHexec()" onkeypress="ETHexec()" onclick="this.select();" required>
    </div>

    <div>
        <label for="BTCvalue" class="form-label">Bitcoin (BTC)</label>
        <input type="number" id="BTCvalue" name="BTCvalue" size="15" maxlength="13" min="0.000000001"  onkeyup="BTCexec()" onkeypress="BTCexec()" onclick="this.select();" required>
    </div>
   
    <div>
      <label for="EURvalue" class="form-label">Euro (EUR)</label>
      <input type="number" id="EURvalue" name="EURvalue" size="15" maxlength="13" min="0.01" onkeyup="EURexec()" onkeypress="EURexec()" onclick="this.select();" required>
   </div>
   <div>
      <label for="BRLvalue" class="form-label">Brazilian Real (BRL)</label>
      <input type="number" id="BRLvalue" name="BRLvalue" size="15" maxlength="13" min="0.01" onkeyup="BRLexec()" onkeypress="BRLexec()" onclick="this.select();" required>
   </div>

   <br>

<!--
   
<button onclick="PLTexec()">PLT</button>
<button onclick="exec()">USD</button>
<button onclick="MATICexec()">MATIC</button>
<button onclick="ETHexec()">ETH</button>
<button onclick="BTCexec()">BTC</button>
<button onclick="EURexec()">EUR</button>
<button onclick="BRLexec()">BRL</button>

-->

<?php include '../price.php';?>

<button type="button">Click Me!</button>

</body>
</html>