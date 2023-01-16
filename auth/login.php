<?php
    session_start();

    include "../connection.php";
    if(isset($_POST['username']) && isset($_POST['password'])){
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        };

        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        
        
        if(empty($username)) {
            header("Location: ../index.php?error= User Name is required");
            exit();
        }
        elseif(empty($password)) {
            header("Location: ../index.php?error= Password is required");
            exit();

        }else{
            $sql = "SELECT * FROM user WHERE USERNAME='$username' AND PASSWORD=$password";
            $result = mysqli_query($conn, $sql);

          
            if (mysqli_num_rows($result) === 1) {
                $rows = mysqli_fetch_assoc($result);
               
                if($rows['USERNAME'] === $username && $rows['PASSWORD'] === $password){
                    $_SESSION['USERNAME'] = $rows['USERNAME'];
                    $_SESSION['SSN'] = $rows['SSN'];
                    $_SESSION['ROLE_ID'] = $rows['ROLE_ID'];
                    
                    if ($rows['ROLE_ID'] == 1) {
                        header("Location: ../screen/dashboard.php");
                        exit();
                    }else if ($rows['ROLE_ID'] == 2){
                        header("Location: ../screen/ad.php");
                        exit();
                    }else{
                        echo "don't found";
                    }

                    
                }else{
                    header("Location: ../index.php?error= Incorrect User name or password");
                exit();
                }
            }else{
                header("Location: ../index.php?error= Incorrect User name or password");
                exit();
            }
        }

    }else{
        header("Location: ../../index.php");
        exit();
    }

?>

