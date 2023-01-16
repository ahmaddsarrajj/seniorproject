<?php
include "../connection.php";
header("Access-Control-Allow-Origin: http://localhost:3000");

 $trp = mysqli_query($conn, "SELECT * from coins");
 $rows = array();
 while($r = mysqli_fetch_assoc($trp)) {
     $rows[] = $r;
 }
 print json_encode($rows);
?>