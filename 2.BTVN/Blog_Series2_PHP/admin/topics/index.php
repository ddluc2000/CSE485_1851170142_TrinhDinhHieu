
<?php include("../../path.php");?>
<?php include($ROOT_PATH . "/app/controllers/topics.php");?>
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
    <title>Admin Section - Manage Topics</title>
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

                <h2 class="page-title">Manage Topics</h2>

                <?php include($ROOT_PATH . "/app/includes/message.php");?>

                <table>
                    <thead>
                        <th>N</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($topics as $key => $topic):?>
                            <tr>
                            <td><?php echo $key + 1;?></td>
                            <td><?php echo $topic['name'];?></td>
                            <td><a href="edit.php?id=<?php echo $topic['id'];?>" Class="edit" >Edit</a></td>
                            <td><a href="#" Class="delete">Delete</a></td>
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