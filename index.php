<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index1.css">
    <title>Document</title>
</head>
<body>
    <div class="big-container">
        <div class="container">
            <div class="form">
                <h1>Login</h1>
                <?php if (isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <form action="auth/login.php" method="post">
                    <div class="input">
                        <div class="form_input">
                            <input type="text" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form_input">
                            <input type="password" name="password" placeholder="Enter your password">
                        </div>
                    </div>
                    <input type="submit" value="Login" name="submit" class="btn-login">
                    <p>
                        This page is only for admins
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>