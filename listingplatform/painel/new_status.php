<?php

include '../conexao.php';

function verificaStatusSite($url) {
    $headers = @get_headers($url);

    if ($headers) {
     
        $statusCode = explode(' ', $headers[0])[1];

       
        $onlineStatusCodes = array('200', '401', '403', '500', '308');

        if (in_array($statusCode, $onlineStatusCodes)) {
            return '<span style="color: green;">Online</span>';
        } else {
            return '<span style="color: red;">Offline</span>';
        }
    } else {
        return '<span style="color: red;">Failed to get headers</span>';
    }
}


if (isset($_POST['status'])) {
    $sql = "SELECT ID, Link FROM granna80_bdlinks.links";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $status = verificaStatusSite($row["Link"]);
         
            $updateSql = "UPDATE granna80_bdlinks.links SET status = '$status' WHERE ID = " . $row["ID"];
            $conn->query($updateSql);
        }
    }

    echo "Status updated successfully";
}

$conn->close();
?>
