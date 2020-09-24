<?php include('path.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Somewhere font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
    
    <?php include(ROOT_PATH . "/app/includes/header.php");?>

    <div class="auth-content">
        <form action="login.php" method="post">
            <h2 class="form-title">Login</h2>
            <div>
                <label>Username</label>
                <input type="text" name="username" class="text-input">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" class="text-input">
            </div>
          
            <center>
            <div>
                <button type="submit" class="btn btn_submit" name="login-btn">Login</button>
            </div>
            </center>
            <p>Or <a href="<?php echo BASE_URL . '/register.php'?>">Register</a></p>
        </form>
    </div>
    <!-- script SLICKS   -->


    <!--ERROR _ RESP DISPLAY-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- CUSTOM    -->
    <script src="assets/js/script.js"></script>
</body>
</html>