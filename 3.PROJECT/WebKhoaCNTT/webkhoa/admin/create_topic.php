<?php   include("../path.php");?>
<?php include(ROOT_PATH ."/admin/controller/topic.php"); 
adminsOnly();?>
<!doctype html>
<html lang="en">

<head>
    <title>Create Topic</title>
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
                        <h1>Add Topic</h1>
                        <?php   include(ROOT_PATH . '/includes/public/message.php'); ?>
                        <form method="post" enctype="multipart/form-data"   action="create_topic.php">
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" >
                            </div>
                            <button type="submit" name="add-topic" class="btn btn-primary" >Add Topic</button>
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