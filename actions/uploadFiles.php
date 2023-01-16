<?php
session_start();
include "../connection.php";

$name = "";
$symbol = "";
$amount = "";



      // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      if( $_SERVER['REQUEST_METHOD'] == 'POST') {

          $name = $_POST["name"];
          $amount = $_POST["amount"];
          $symbol = $_POST["symbol"];
          
      
      $errorMesg = "";
      $successMesg = "";
      
      do {
          if (empty($name) || empty($symbol) || empty($amount)) {
              $errorMesg = "All fields are required!";
              break;
          }
      
          $query = "INSERT INTO coins (`NAME`, `SYMBOL`, `AMOUNT`) VALUES ('$name', '$symbol', '$amount')";
          $result   = mysqli_query($conn, $query);  
      
      
          $name = "";
          $symbol = "";
          $amount = "";
          $successMesg = "Coin Added Correctly";
      
          header("location: ../screen/dashboard/coins.php?successMesg=$successMesg");
          exit;
      } while (false);

    

}




?>
