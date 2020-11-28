<?php   include("../path.php");?>
<?php include(ROOT_PATH ."/admin/controller/user.php"); adminsOnly();
?>
<!doctype html>
<html lang="en">

<head>
    <title>ManageUser</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <!--FontAwesome -->
    <script src="https://kit.fontawesome.com/b83b93c2d0.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include(ROOT_PATH . "/includes/admin/header_admin.php"); ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                <a name="" id="" class="btn btn-primary" href="<?php echo BASE_URL ."/admin/create_admin.php";?>"
                        role="button">Add User</a>
                <h1>Manager Post</h1>
                <?php include(ROOT_PATH .'/includes/public/errors.php'); ?>
                    <?php   include(ROOT_PATH . '/includes/public/message.php'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($admin as $key => $userr): ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $userr['username']; ?></td>
                                <td><?php echo $userr['email']; ?> </td>
                                <td><a href="edit_user.php?id=<?php echo $userr ['id']; ?>"><i class="fas fa-user-edit"></i></a></td>
                                <td><a href="index_admin.php?del_id=<?php echo $userr ['id']; ?>"onclick="return confirm('Bạn có muốn xóa không?')"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <?php  endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 ">
                    <?php include(ROOT_PATH ."/includes/admin/menu_admin.php"); ?>
                </div>
            </div>
        </div>
    </main>
    <?php include(ROOT_PATH . "/includes/admin/footer_admin.php"); ?>