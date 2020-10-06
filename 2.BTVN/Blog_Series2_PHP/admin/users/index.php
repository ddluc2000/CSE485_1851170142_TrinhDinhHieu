
<?php include("../../path.php");?>
<?php include($ROOT_PATH . "/app/controllers/users.php");?>
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
    <title>Admin Section - Manage Users</title>
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
                <a href="create.php" class="btn btn_submit">Add User</a>
                <a href="index.php" class="btn btn_submit">Manage Users</a>
            </div>

            <div class="content">

                <h2 class="page-title">Manage Users</h2>

                <?php include($ROOT_PATH . "/app/includes/message.php");?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>    
                        <?php foreach($admin_users as $key => $user): ?>
                            <tr>
                            <td><?php echo $key +1;?></td>
                            <td><?php echo $user['username'];?></td>
                            <td><?php echo $user['email'];?></td>
                            <td><a href="#" Class="edit" >Edit</a></td>
                            <td><a href="index.php?delete_id=<?php echo $user['id'];?>" Class="delete">Delete</a></td>
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