<?php
session_start();
include "../../connection.php";

$name = "";
$page = "";
$symbol = "";
$type_id = "";

$errorMesg = "";
$successMesg = "";
if( $_SERVER['REQUEST_METHOD'] == 'GET') {
    if(!isset($_GET["id"])) {
        header("location: ../../screen/dashboard/user.php");
        exit();
    }

    $id = (int) $_GET["id"];

    $get = "SELECT * FROM user WHERE SSN = $id ";
    $getdata   = mysqli_query($conn, $get);  
    $row = mysqli_fetch_assoc($getdata);

    if (!$row) {
        header("location: ../../screen/dashboard/user.php");
        exit();
    }
    
    $name = $row['USERNAME'];
    $password = "";
    $conf_password = "";
    $role = $row['ROLE_ID'];
}else{
    $id = (int) $_GET["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $conf_password = $_POST["conf-password"];
    $role= $_POST["role"];

    do {
        if (empty($name) || empty($password) || empty($conf_password) || empty($role)) {
            $errorMesg = "All fields are required!";
            break;
        }
        if($password === $conf_password){
            $query = "UPDATE `user` SET `USERNAME`='$name',`ROLE_ID`='$role',`PASSWORD`='$password' WHERE SSN = $id";
            $update   = mysqli_query($conn, $query);  
            $successMesg = "Coins Updated Correctly";
            header("location: ../../screen/dashboard/user.php");
            exit();
        }else{
                $errorMesg = "check your password";
        }
    
    } while (false);
}


$role_query = 'SELECT * FROM role';
$get_role = mysqli_query($conn, $role_query);




if (isset($_SESSION['SSN']) && isset($_SESSION['USERNAME']) && isset($_SESSION['ROLE_ID']) == 1 ) {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css"> 
        <script src="....//node_modules/bootstrap/dist/js/bootstrap.min.js"></script>      
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <title>Home</title>
    </head>
    <style>
        a{
            text-decoration: none;
            color: rgb(216, 216, 216);
            font-weight: 600;
        }
        a:hover{
            color: white;
        }
        label{
            color: #a0a0a0
        }
    </style>
<body>
    <!-- header -->
    <header>
        <div class="py-2 px-5 bg-dark d-flex justify-content-end">
        <a href="../auth/logout.php" class="px-5">logout</a>  
        </div>
    </header>

    <div class="container my-5">
        <h2 class="pb-5">
            Create New User
        </h2>

        <?php 
            if (!empty($errorMesg)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMesg</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label>User Name</label>
                <div >
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label>Password</label>
                <div >
                    <input type="password" class="form-control" name="password" value="<?php echo $password;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label>Confirm Password</label>
                <div >
                    <input type="password" class="form-control" name="conf-password" value="<?php echo $conf_password;?>">
                </div>
            </div>
            <div class="row mb-3">
            <label>Role</label>
                <div >
                    <select name="role" class="custom-select  form-control" id="inputGroupSelect01">
                        <option selected>Role...</option>
                        <?php 
                        while ($row = mysqli_fetch_assoc($get_role)) {
                            echo "
                            <option value='".$row['ROLE_ID']."'>"
                                .$row['NAME'].
                            "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <?php
             if (!empty($successMesg)) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMesg</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }   
            ?>
            <div class="row my-5 d-flex justify-content-end">
            <div class="offset-sm-3 col-sm-2 d-grid">
                   <a href="../../screen/dashboard/user.php" role="button" class="btn btn-secondary">
                    Cancel
                </a>
                </div>
                <div class=" col-sm-2 d-grid">
                   <button type="submit" class="btn btn-success">
                   Update
                </button>
                </div>

                
            </div>

        </form>
    </div>

</body>
</html>

<?php
}else{
    header("Location: ../../screen/dashboard.php");
                   exit();
 }
?>