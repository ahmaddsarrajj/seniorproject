<?php
include "../../connection.php";

    if (isset($_GET["id"])) {
        $id= $_GET["id"];
        $sql = "DELETE FROM USER  WHERE SSN = $id";
        
        $result = mysqli_query($conn, $sql);
    }

    header("location: ../../screen/dashboard/user.php");
    exit;
?>