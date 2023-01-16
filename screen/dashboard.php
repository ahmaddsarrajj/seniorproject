<?php 
session_start();
include "../connection.php";

$get_users= 'SELECT COUNT(`USERNAME`) FROM `user`;';
$u_number   = mysqli_query($conn, $get_users);
$user_number = mysqli_fetch_assoc($u_number);

$get_Coins= 'SELECT COUNT(`NAME`) FROM `Coins`;';
$C_number   = mysqli_query($conn, $get_Coins);
$Coins_number = mysqli_fetch_assoc($C_number);

if (isset($_SESSION['SSN']) && isset($_SESSION['USERNAME']) && $_SESSION['ROLE_ID']== 1) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

        <!-- css -->
    <link rel="stylesheet" href="../style/admi.css">

    
    <title>dashboard</title>
</head>

<body>
    <!-- header -->
    <header>
        <div class="py-2 px-5 bg-dark d-flex justify-content-end">
            <a href="../auth/logout.php" class="px-5">logout</a>
        </div>
    </header>

    <div class="d-flex flex-row">

        <!-- section -->
        <div class=" 
            border
            position-fixed
            " style="height:736px">
            <ul class="nav flex-column p-2 text-center">
                <li class="nav-item py-4">
                    <span class="special">Dashboard panel</span>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link text-secondary" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link text-secondary" href="dashboard/Coins.php">Coins</a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link text-secondary" href="dashboard/user.php">Users</a>
                </li>
            </ul>
        </div>
        
        <div class="main">
            <div class="numbers">
                <div class="container num img2" style="background-color: rgba(0, 128, 0, 0.788);">
                    <?php
                    echo" <p id='nbr1'>".$user_number['COUNT(`USERNAME`)']."</p>";
                    ?>
                    <span>Users</span>
                </div>
                <div class="container num img1"  style="background-color: rgba(0, 128, 0, 0.788);">
                <?php
                    echo" <p id='nbr2'>".$Coins_number['COUNT(`NAME`)']."</p>";
                    ?>
                    <span>Coins</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
}else{
    header("Location: ../../index.php");
                   exit();
 }
?>