
<?php include("../../path.php");?>

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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Section - Manage Posts</title>
</head>
<body>
    <!-- ADmin header include here -->
    <?php include($ROOT_PATH.'/app/includes/adminHeader.php');?>
    <!--PageWrapper-->
    <div class="admin-wrapper">
        <!-- LeftSidebar-->
        <!-- End-LeftSidebar-->

        <?php include($ROOT_PATH.'/app/includes/adminSidebar.php');?>

        <!--Admin content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn_submit">Add Post</a>
                <a href="index.php" class="btn btn_submit">Manage Posts</a>
            </div>

            <div class="content">

                <h2 class="page-title">Manage Posts</h2>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>This is the first Post</td>
                            <td>HieuTran</td>
                            <td><a href="#" Class="edit" >Edit</a></td>
                            <td><a href="#" Class="delete">Delete</a></td>
                            <td><a href="#" Class="publish">Publish</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>This is the second Post</td>
                            <td>HieuTran</td>
                            <td><a href="#" Class="edit" >Edit</a></td>
                            <td><a href="#" Class="delete">Delete</a></td>
                            <td><a href="#" Class="publish">Publish</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--END - Admincontent-->
    </div>
    <!--END-PageWrapper-->
    
    <!--Ckeditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <!-- CUSTOM    -->
    <script src="../../assets/js/editor.js"></script>
</body>
</html>