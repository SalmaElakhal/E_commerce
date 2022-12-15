<?php
if ( isset($_GET["numclient"]) ) {
    $numclient = $_GET["numclient"];
    
    include 'config.php';

    $sql = "DELETE FROM clients WHERE numclient=$numclient";
    $result = mysqli_query($conn, $sql);

   // $conn->query($sql);
}
header("location: client.php");
?>