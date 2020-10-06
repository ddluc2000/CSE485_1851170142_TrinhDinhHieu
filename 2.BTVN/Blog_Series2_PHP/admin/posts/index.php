
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

                <?php include($ROOT_PATH . "/app/includes/message.php");?>

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        
                            <?php foreach($posts as $key => $post):?>
                            <tr>
                                <td><?php echo $post['id'];?></td>
                                <td><?php echo $post['title'];?></td>
                                <td>HieuTran</td>
                                <td><a href="edit.php?id=<?php echo $post['id'];?>" Class="edit" >Edit</a></td>
                                <td><a href="edit.php?delete_id=<?php echo $post['id'];?>" Class="delete">Delete</a></td>
                                
                                <?php if($post['published']):
                                ?>
                                <td><a href="edit.php?published=0&p_id=<?php echo $post['id']?>" Class="unpublish">Unpublish</a></td>
                                <?php else: ?>
                                    <td><a href="edit.php?published=1&p_id=<?php echo $post['id']?>" Class="publish">Publish</a></td>
                                <?php endif;?> 
                            </tr>
                            <?php endforeach;?>
                        
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