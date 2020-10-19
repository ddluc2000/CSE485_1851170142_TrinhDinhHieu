<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
<link rel="stylesheet" href="assets/css/user.css">
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-content">
                        <img src="assets/images/img1.jpeg" alt="image nao do" class="rounded-circle">
                        <div class="user-info">
                            <div class="fullname"><h1><?php echo $user['fullname'];?></h1></div>
                            <div class="username"><h4><?php echo $user['username'];?></h4></div>
                            <div class="role"><?php $role=$user['admin']==0?"Thành viên":"Quản trị viên";echo $role;?></div>
                            <div class="create_at">Joined: <?php echo $user['create_at'];?></div>
                            <div class="email"><?php echo $user['email'];?></div>
                        </div>
                    </div>

                    <div class="list-posted">
                        Các bài post
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
