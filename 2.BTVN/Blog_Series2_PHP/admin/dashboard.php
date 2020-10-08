
<?php include("../path.php");?>
<?php include($ROOT_PATH . "/app/controllers/posts.php");

adminOnly();?>
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Admin Section - Add Post</title>
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

            <div class="content">

                <h2 class="page-title">Dash Board</h2>

                <?php include($ROOT_PATH . "/app/includes/message.php");?>

                
            </div>
        </div>
        <!--END - Admincontent-->
    </div>
    <!--END-PageWrapper-->
    
    <!--Ckeditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <!-- CUSTOM    -->
    <script src="../assets/js/editor.js"></script>
</body>
</html>