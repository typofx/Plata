<!DOCTYPE html>
<html lang="en">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./new-listing/desktop-style-new-listing.css">
</head>


<body>
<center>




<?php  session_start();  ?>




    <br>
    <br>

    <h1 class="title-plataforma">Plataforma</h1>
    <h2>$PLT Plata Token Listing Places</h2>

    <?php
    include 'conexao.php';

   
    $fullMode = isset($_GET['mode']) && $_GET['mode'] === 'full';

    $sql = "SELECT * FROM granna80_bdlinks.links";


    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $sql .= " WHERE (`Platform` LIKE '%$searchTerm%') || (`Type` LIKE '%$searchTerm%')";
    }

    if ($fullMode) {
        $sql .= " WHERE (`Listed` = 1) ORDER BY `Score` DESC, Access DESC, Rank DESC";
    } else {
        $sql .= " ORDER BY `Score` DESC, Access DESC, Rank DESC";
    }

    $result = $conn->query($sql);

    $sqlScore = "SELECT * FROM granna80_bdlinks.links ORDER BY `Access` DESC LIMIT 1 OFFSET 5";
    $resultScore = $conn->query($sqlScore);

    if ($resultScore->num_rows > 0) {

        while ($rowScore = $resultScore->fetch_assoc()) {
            $avgScore = (float)($rowScore["Access"]) / 2;
        }
    }

    function getTXTcolor($value)
    {
        if ($value == 'K' || $value == 'Y') {
            return 'color: green;';
        } elseif ($value == 'Z') {
            return 'color: gray;';
        } elseif ($value == 'E' || $value == 'W') {
            return 'color: red;';
        } else {
            return '';
        }
    }

    function getAccessLetter($accessValue, $avgScore)
    {
        if ($accessValue >= ($avgScore * 0.5)) {
            return 'A+';
        }
        if ($accessValue >= ($avgScore * 0.25)) {
            return 'A';
        }
        if ($accessValue >= ($avgScore * 0.125)) {
            return 'B';
        }
        if ($accessValue >= ($avgScore * 0.03)) {
            return 'C';
        } else {
            return 'D';
        }
    }

    function getTICKcolor($value)
    {
        if ($value == 'K' || $value == 'Y') {
            return 'green';
        } else {
            return 'gray';
        }
    }

    function tokenRanked($data)
    {
        if ($data == '-') {
            return 'color: gray;';
        } else {
            return 'color: green;';
        }
    }
    $sqlTotal = "SELECT COUNT(*) AS TotalListed FROM granna80_bdlinks.links WHERE Listed = 1";
    $resultTotal = $conn->query($sqlTotal);


    // Check if there are results and fetch the total
    if ($resultTotal->num_rows > 0) {
        $totalRow = $resultTotal->fetch_assoc();
        $totalListed = $totalRow['TotalListed'];

     

    }

    if ($result->num_rows > 0) {
      
        echo '
    <form action="" method="get">
        <label for="search">Filter : </label>
        <input type="text" id="search" name="search" autocomplete="off">&nbsp;<input type="submit" value="&#128269;">
        <br><p>Plata Token (PLT) is listed on ' . $totalListed . ' websites.</p>
    </form>';
   
   



 

        echo ' 
    <table class="listing-container table table-hover">
        <tr class="label">
            <td class="number padding-column border-bottom2px">#</td>
            <!--  <td class="desktop padding-column border-bottom2px" onclick="msgInfo()">🖳</td> -->
            <!--   <td class="mobile padding-column border-bottom2px" onclick="msgInfo()">☎</td> -->
            <td colspan="2" class="platform padding-column border-bottom2px">Platform</td>
          
            <td class="country padding-column border-bottom2px">     </td>
            <td class="category padding-column border-bottom2px">Category</td>
            <!-- <td class="metrics padding-column border-bottom2px">Metrics</td> -->
            <!--    <td colspan="13" class="performance padding-column border-bottom2px">Performance</td> -->
            <td class="score padding-column border-bottom2px">Score</td>
        </tr>';


        $i = 1;

        while ($row = $result->fetch_assoc()) {

            echo '<tr class="platform-data">';
            echo '<td class="number padding-column border-bottom1px" id="number">';
            echo '<span class="text-number">' . $i . '</span>';
            echo '</td>';
           // echo '<td class="desktop padding-column border-bottom1px text-center" id="desktop">';
           // echo '<img height="13px" src="https://www.plata.ie/images/listing-' . getTICKcolor($row["Desktop"]) . '-tick.svg">';
           // echo '</td>';
            
          //  echo '<td class="mobile padding-column border-bottom1px text-center" id="mobile">';
           // echo '<img height="13px" src="https://www.plata.ie/images/listing-' . getTICKcolor($row["Mobile"]) . '-tick.svg">';
           // echo '</td>';
            
            echo '<td class="logo-platform padding-column border-bottom1px"><img src="' . (empty($row["logo"]) ? "https://plata.ie/images/platatoken200px.png" : "https://www.plata.ie/images/icolog/" . $row["logo"]) . '" alt="img" height="25px" class="black-and-white"></td>';

            echo '<td class="platform1 padding-column border-bottom1px" id="platform">';
            echo '<a class="a-listing-places" href="' . $row["Link"] . '" target="_blank">' . $row["Platform"] . '</a>';
            echo '</td>';
            echo '<td class="country padding-column border-bottom1px" id="country">';
            echo '<img src="https://www.plata.ie/images/flags/' . $row["Country"] . '.png" alt="' . $row["Country"] . '" height="15" width="15">';
            echo '</td>';
            echo '<td class="category padding-column border-bottom1px" id="category">' . $row["Type"] . '</td>';
           
          //  echo '<td class="metrics padding-column border-bottom1px" id="metrics">' . getAccessLetter($row["Access"], $avgScore) . '</td>';
          //  echo '<td class="performance-bars border-bottom1px" style="' . tokenRanked($row["Rank"]) . '">█</td>';
          //  echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["MarketCap"]) . '">█</td>';
           // echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["Liquidity"]) . '">█</td>';
          //  echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["FullyDilutedMKC"]) . '">█</td>';
          //  echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["CirculatingSupply"]) . '">█</td>';
          //  echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["MaxSupply"]) . '">█</td>';
          //  echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["TotalSupply"]) . '">█</td>';
          //  echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["Price"]) . '">█</td>';
           // echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["Graph"]) . '">█</td>';
           // echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["Holders"]) . '">█</td>';
           // echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["TokenLogo"]) . '">█</td>';
           // echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["SocialMedia"]) . '">█</td>';
            //echo '<td class="performance-bars border-bottom1px" style="' . getTXTcolor($row["MetamaskButton"]) . '">█</td>';
            echo '<td class="score padding-column border-bottom1px" id="score">' . number_format($row["Score"], 0, '.', '') . '%</td>';

            echo '</tr>';

            $i++;
        }

        echo '</table></div><br><br>  '; //<a href="https://plata.ie/listingplatform/painel/painel.php" target="_blank">edit</a>
    } else {
        echo "No results found.";
    }

    $conn->close();

   

    echo '<div class="button-container">';
    echo '<form action="" method="get">';
    echo '<input type="checkbox" id="platalisted" name="mode" value="full" onchange="this.form.submit()"';
    if ($fullMode) {
        echo ' checked';
    }
    echo '>';
    echo '<label for="platalisted">Plata Token listed Platforms.</label>';
    echo '</form><br><br>';
    echo '<br>';
    echo '<br>';
    echo '</div>';
    echo '</div>';
    ?>
</body>
</center>
</html>
<script>

var table = document.querySelector('.listing-container');


var lastRow = table.querySelector('tr:last-child');


var cellsInLastRow = lastRow.querySelectorAll('.border-bottom1px');
for (var i = 0; i < cellsInLastRow.length; i++) {
    cellsInLastRow[i].style.borderBottom = 'none';
}


</script>










    <script>
        function msgInfo() {
            alert("Help\nWebsite Listed on Desktop Version;\nWebsite Listed on Mobile Version;");
        }
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RXYGWW7KHB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-RXYGWW7KHB');
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>