<?php
include "../../connection.php";

    if (isset($_GET["id"])) {
        $id= $_GET["id"];
        $sql = "DELETE FROM coins  WHERE COINS_ID = $id";
        
        $result = mysqli_query($conn, $sql);
    }

    header("location: ../../screen/dashboard/coins.php");
    exit;
?>