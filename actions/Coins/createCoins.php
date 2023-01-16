<?php
session_start();
include "../../connection.php";

$name = "";
$symbol = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $page = $_POST["page"];
    $symbol = $_POST["symbol"];
    

$errorMesg = "";
$successMesg = "";

do {
    if (empty($name) || empty($symbol) || empty($type_id)) {
        $errorMesg = "All fields are required!";
        break;
    }

    $query = "INSERT INTO Coins (NAME, PAGECOUNT, symbol, AUTHOR_ID, TYPE_ID) VALUES ('$name', '$page', '$symbol', '$type_id')";
    $result   = mysqli_query($conn, $query);  

    $name = "";
    $page = "";
    $symbol = "";
    $type_id = "";
    $successMesg = "Coins Added Correctly";

    header("location: ../../screen/dashboard/coins.php");
    exit;
} while (false);
}


$get_type = "SELECT * FROM TYPE";
$get_all_types   = mysqli_query($conn, $get_type);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css"> 
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>      
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
        .submit{
            background-color: #834503;
        }
    </style>
<body>
    <!-- header -->
    <header>
        <div class="py-2 px-5 bg-dark d-flex justify-content-end">
        <a href="../../auth/logout.php" class="px-5">logout</a>  
        </div>
    </header>

    <div class="container my-5">
        <h2 class="pb-5">
            Create New Coins
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
                <label>Name</label>
                <div >
                    <input type="text" class="form-control" name="name" value="<?php echo "$name";?>">
                </div>
            </div>

            <div class="row mb-3">
                <label >Pages Number</label>
                <div >
                    <input type="number" class="form-control" name="page" value="<?php echo "$page";?>">
                </div>
            </div>

            <div class="row mb-3">
            <label>Select Coins :</label>
            <div >
                    <input type="file" class="form-control" name="symbol" value="<?php echo "$symbol";?>">
                </div>
            </div>

            <div class="row mb-3">
                <div >
                    <select name="type" class="custom-select  form-control" id="inputGroupSelect01">
                        <option selected>Type...</option>
                        <?php 
                        while ($type = mysqli_fetch_assoc($get_all_types)) {
                            echo "
                            <option value='".$type['TYPE_ID']."'>"
                                .$type['NAME'].
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
                   <a href="../../screen/dashboard/coins.php" role="button" class="btn btn-secondary">
                    Cancel
                </a>
                </div>
                <div class=" col-sm-2 d-grid">
                   <button type="submit" class="btn submit text-white">
                    Add
                </button>
                </div>

                
            </div>
                    
        </form>
    </div>

</body>
</html>