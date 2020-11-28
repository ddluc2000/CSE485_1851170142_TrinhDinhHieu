<?php   include("../path.php");?>
<?php include(ROOT_PATH ."/admin/controller/topic.php");adminsOnly();
 ?>
<!doctype html>
<html lang="en">

<head>
    <title>ManageTopic</title>
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
    <?php include(ROOT_PATH ."/includes/admin/header_admin.php"); ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <a name="" id="" class="btn btn-primary" href="<?php echo BASE_URL .'/admin/create_topic.php' ?>" role="button">Add Topic</a>
                    <?php   include(ROOT_PATH . '/includes/public/message.php'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach($topics as $key => $topic): ?>
                            <tr>
                                <td scope="row"><?php echo $key + 1; ?></td>
                                <td><?php echo $topic['name']; ?></td>
                                <td><a href="edit_topic.php?id=<?php echo $topic ['id']; ?>"><i class="fas fa-user-edit"></i></a></td>
                                <td><a href="index_topic.php?del_id=<?php echo $topic ['id']; ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                     
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