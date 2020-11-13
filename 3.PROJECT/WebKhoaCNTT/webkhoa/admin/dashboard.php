<?php   include("../path.php");?>
<?php include(ROOT_PATH ."/admin/controller/post.php");
adminsOnly(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    
</head>

<body>
    <?php include(ROOT_PATH ."/includes/admin/header_admin.php"); ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="col-sm-12 p-0">
                        <h1>Dashboard</h1>
                        <?php   include(ROOT_PATH . "/includes/public/message.php"); ?>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <?php include(ROOT_PATH ."/includes/admin/menu_admin.php"); ?>
                </div>
            </div>
        </div>
    </main>
    <?php include(ROOT_PATH . "/includes/admin/footer_admin.php"); ?>