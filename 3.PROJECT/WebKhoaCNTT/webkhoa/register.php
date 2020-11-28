<?php include("path.php") ?>
<?php include(ROOT_PATH ."/admin/controller/user.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                <form  action="register.php" method="post">
                    <h2 class="h4 mb-4 text-center ">Đăng kí</h2>
                    <?php include(ROOT_PATH .'/includes/public/errors.php'); ?>
                    
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control"">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control"">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control"">
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" name="passwordCom" value="<?php echo $passwordCom; ?>" class="form-control"">
                    </div>
                    <div class="form-group  ">
                        <button type="submit" name="register-btn" class="btn btn-block my-4 btn-primary">Đăng kí</button>
                    </div>
                    <p>Hoặc <a href="<?php echo BASE_URL .'/login.php' ?>">Đăng nhập</a></p>
                </form>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH. '/includes/admin/footer_admin.php') ?>