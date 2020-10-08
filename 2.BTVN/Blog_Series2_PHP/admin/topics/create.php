
<?php include("../../path.php");?>
<?php include($ROOT_PATH . "/app/controllers/topics.php");
adminOnly();
?>


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
    <title>Admin Section - Add Topic</title>
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
                <a href="create.php" class="btn btn_submit">Add Topic</a>
                <a href="index.php" class="btn btn_submit">Manage Topics</a>
            </div>

            <div class="content">

                <h2 class="page-title">Add Topic</h2>

                <?php include($ROOT_PATH . "/app/helpers/formErrors.php");?>

                <form action="create.php" method="post">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $name;?>"class="text-input">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea name="description" value="<?php echo $description;?>" id="body"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="add-topic"class="btn btn_submit">Add Topic</button>
                    </div>
                </form>
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