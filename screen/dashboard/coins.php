<?php
session_start();
include "../../connection.php";

$get_coins = "SELECT * FROM coins";
$get_all_coins = mysqli_query($conn, $get_coins);

if (isset($_SESSION['SSN']) && isset($_SESSION['USERNAME']) == 1) {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css"> 
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>      
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../style/admi.css">
        <!-- icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Home</title>
    </head>
    <style>
        .search{
        width: 100%;
        padding: 5px 10px;
        border: 2px solid grey;
        border-radius: 12px;
        margin-bottom: 24px
    }
        </style>
        <script>
        function showHint(str) {
            if (str.length == 0) {
                
            }
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "../../actions/book/searchCoins.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
<body>
    <!-- header -->
    <header>
        <div class="py-2 px-5 bg-dark d-flex justify-content-end">
        <a href="../../auth/logout.php" class="px-5">logout</a>  
        </div>
    </header>

    <div class="d-flex flex-row ">

        
            <!-- section -->
            <div class=" 
            border
            position-fixed
            "
            style="height:736px"
            >
                <ul class="nav flex-column p-2 text-center" >
                    <li class="nav-item py-4">
                    <span class="special">Dashboard panel</span>
                    </li>
                    <li class="nav-item py-2">
                        <a class="nav-link text-secondary" href="../../screen/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item py-2">
                        <a class="nav-link text-secondary" href="coins.php">Coins</a>
                    </li>
                    <li class="nav-item py-2">
                        <a class="nav-link text-secondary" href="user.php">Users</a>
                    </li>
                </ul>
            </div>
            <!-- body -->
            <div class="d-felx container my-5 " style="padding-left:200px">
                
                <div class="mb-5 d-flex flex-row justify-content-between">
                    <h2>Coins</h2>
                    <a href="../../actions/book/createCoins.php" class="btn text-white p-3" role="button">New Coins</a>
                </div>
                
                <div>
                    <input type="text" placeholder="search..." class="search" onkeyup="showHint(this.value)">
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Symbol</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="txtHint">
                       <?php
                       while($Coins=mysqli_fetch_assoc($get_all_coins)){
    
    
                                echo "
                                <tr>
                                    <td>".$Coins['COINS_ID']."</td>
                                    <td>".$Coins['NAME']."</td>
                                    <td>".$Coins['SYMBOL']."</td>
                                    <td>".$Coins['AMOUNT']."</td>
                                    <td>
                                        <div class='dropdown'>
                                            <button class='dropbtn' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <i class='material-icons'>menu</i>
                                            </button>
                                            <div class='dropdown-content' aria-labelledby='dropdownMenuButton'>
                                                <a href='../../actions/Coins/delete.php?id=".$Coins['COINS_ID']."'>Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                               ";
                       }
                           ?>
                    </tbody>
                </table>
            </div> 
    </div>
</body>
</html>

<?php
}else{
    header("Location: ../index.php");
                   exit();
 }
?>