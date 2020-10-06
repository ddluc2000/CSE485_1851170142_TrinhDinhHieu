
<?php include("../../path.php");?>
<?php include($ROOT_PATH . "/app/controllers/posts.php");?>
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
            <div class="button-group">
                <a href="create.php" class="btn btn_submit">Add Post</a>
                <a href="index.php" class="btn btn_submit">Manage Posts</a>
            </div>

            <div class="content">

                <h2 class="page-title">Add Post</h2>

                <?php include($ROOT_PATH . "/app/helpers/formErrors.php");?>

                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $title ;?>" class="text-input">
                    </div>
                    <div>
                        <label>Body</label>
                        <textarea name="body" id="body" ><?php echo $body;?></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value=""></option>
                            <?php foreach($topics as $key => $topic):?>
                                <?php if (!empty($topic_id)&& $topic_id == $topic['id']):?>
                                    <option selected value="<?php echo $topic['id'];?>"><?php echo $topic['name'];?></option>
                                <?php else: ?>
                                    <option value="<?php echo $topic['id'];?>"><?php echo $topic['name'];?></option>
                                <?php endif; ?>
                                
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div>
                    <?php if (empty($published)):?>
                            <label>
                                <input type="checkbox" name="published" >
                                Publish
                            </label>
                        <?php else: ?>
                            <label>
                                <input type="checkbox" name="published" checked >
                                Publish
                            </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="add-post" class="btn btn_submit">Add Post</button>
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