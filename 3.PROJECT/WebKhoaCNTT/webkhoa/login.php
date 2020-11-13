<?php include("path.php"); ?>
<?php include(ROOT_PATH ."/admin/controller/user.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/b83b93c2d0.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container-fluid">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <a class="navbar-brand" href="<?php echo BASE_URL . '/index.php'; ?>">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </nav>
            </header>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <!-- form login -->
                <form class="text-center border border-light p-5" action="login.php" method="post">
                    <p class="h4 mb-4">Đăng nhập</p>
                    <?php include(ROOT_PATH ."/includes/public/errors.php"); ?>
                    <div class="form-group">
                        <label for="username" style="float:left;">Tên đăng nhập</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control mb-4">
                    </div>
                    <div class="form-group">
                        <label for="password" style="float:left;">Mật khẩu</label>
                        <input type="password" name="password" value="<?php echo $password;?>"
                            class="form-control mb-4">
                    </div>
                    <button name="login-btn" class="btn btn-info btn-block my-4" type="submit">Đăng nhập</button>
                    <p>Bạn chưa có tài khoản?
                        <a href="<?php echo BASE_URL .'/register.php'; ?>">Register</a>
                    </p>
                </form>
                <!-- form login -->
            </div>
        </div>
    </div>
    <?php
    include(ROOT_PATH . '/includes/admin/footer_admin.php');
?>