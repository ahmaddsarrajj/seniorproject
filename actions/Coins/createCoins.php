<?php
session_start();
include "../../connection.php";

$name = "";
$symbol = "";
$amount = "";
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
            background-color: green;
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
        <form method="post"  action="../uploadFiles.php" enctype="multipart/form-data">
            <div class="row mb-3">
                <label>Name</label>
                <div >
                    <input type="text" class="form-control" name="name" value="<?php echo "$name";?>">
                </div>
            </div>

            <div class="row mb-3">
                <label >Amount</label>
                <div >
                    <input type="number" class="form-control" name="amount" value="<?php echo "$amount";?>">
                </div>
            </div>

            <div class="row mb-3">
            <label>Symbol</label>
            <div >
            <input type="text" class="form-control" name="symbol" value="<?php echo "$symbol";?>">
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