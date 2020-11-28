<?php   include("../path.php");?>
<?php include(ROOT_PATH ."/admin/controller/user.php"); 
adminsOnly();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Create Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>

<body>
    <?php include(ROOT_PATH . "/includes/admin/header_admin.php"); ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="col-sm-12 p-0">
                        <h1>Add User</h1>
                        <?php include(ROOT_PATH .'/includes/public/errors.php'); ?>
                        <?php   include(ROOT_PATH . '/includes/public/message.php'); ?>
                        <form method="post" enctype="multipart/form-data" action="create_admin.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" value="<?php echo $username; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" name="password" value="<?php echo $password; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="passwordCom">passowrdcomfirm</label>
                                <input type="password" name="passwordCom" value="<?php echo $passwordCom; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-check">
                            <?php if(isset($admins) && $admins==1): ?>
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="admin" checked>
                                Admin
                              </label>
                              <?php else : ?>
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="admin" >
                                Admin
                              </label>
                              <?php endif; ?>
                            </div>

                            <button type="submit" name="add-admin" class="btn btn-primary">Add Admin</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <?php include(ROOT_PATH ."/includes/admin/menu_admin.php"); ?>
                </div>
            </div>
        </div>
    </main>
    <?php include(ROOT_PATH . "/includes/admin/footer_admin.php"); ?>