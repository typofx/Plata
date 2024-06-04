<link rel="stylesheet" href="https://www.plata.ie/pix3/pix3-style.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<html lang="">

<head>
</head>

<body>
    <div id="boxApp" align="center">
        <div id="box" class="box">
            <h3>Plata Token / PIX </h3>
            <div>

                <form id="form2" method="POST">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo htmlspecialchars($_SESSION['email']);
                    }
                    ?>
                    <div class="div-label"><label for="verification_code">Verification Code:</label></div>
                    <div><input type="tel" id="verification_code" name="verification_code" maxlength="6" autocomplete="off"></div>
                    <hr width="95%" class="hrline" />
                    <div><button type="submit" class="buttonBuyNow" name="verify_code">Confirm Email</button></div>
                    <hr width="95%" class="hrline" />
                    <button type="submit" class="buttonBuyNow" name="resend_code">Resend Code</button>
                    <hr width="95%" class="hrline" />
                    <a href="?cancel=true">Cancelar</a>
                    <br><br><br>
                </form>

            </div>
        </div>
        <br>
        <center><a id="dappVersion">PlataPix dApp Version 1.1.0 (Beta)</a></center>