<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="main-content col-md-12 border border-success">
                    <!-- topic header(title) -->
                    <div class="post-title">
                        <h3><?php echo $post['title']?></h3>
                        <div class="post-info">
                            <span>Posted by: <?php echo $user['username']?></span>
                            <span>Create at: <?php echo $post['create_at']?></span>
                        </div>
                    </div>
                    
                    <div class="post-layout container">
                        <div class="row">
                            <div class="cell-user col-md-2 border border-success">
                                <img src="assets/images/img1.jpeg" alt="" class="img-thumbnail rounded-circle">
                                <div class="user-info">
                                    <div class="user-name"><?php echo $user['fullname'];?></div>
                                    <div class="role"><?php $role=$user['admin']==1?"Quản trị viên":"Thành viên"; echo $role;?></div>
                                    <div class="created-at">Ngày tham gia:<?php echo $user['create_at'];?></div>
                                    <div class="link-fb">link gi do</div>
                                </div>
                            </div>

                            <div class="post-content col-md-10 border border-success">
                                <div class="post-body">
                                    <div class="post-preview">preview gi do</div>
                                    <div><img src="" alt="image nao do"></div>
                                    <?php echo $post['body']?>
                                </div>

                                <footer class="footer-post">
                                    <hr>
                                    <div class="grb-post btn-group" role="group" aria-label="">
                                        <button type="button" class="btn btn-primary">Like</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                        <button type="button" class="btn btn-primary">Report</button>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($comments as $key=>$comment):?>
                    <div><br></div>
                    
                    <div class="comment-layout container">
                        <div class="row">
                            <div class="cell-user col-md-2 border border-success">
                                <img src="assets/images/img1.jpeg" alt="" class="img-thumbnail rounded-circle">
                                <div class="user-info">
                                    <!-- lay thong tin ve user!!! -->
                                    <div class="user-name"><?php echo $us_comment[$key]['fullname'];?></div>
                                    <div class="role"><?php $role=$us_comment[$key]['admin']==1?"Quản trị viên":"Thành viên"; echo $role;?></div>
                                    <div class="created-at">Ngày tham gia:<?php echo $us_comment[$key]['create_at'];?></div>
                                    <div class="link-fb">link gi do</div>
                                </div>
                            </div>

                            <div class="comment-content col-md-10 border border-success">
                                <div class="comment-body">
                                    <?php echo $comment['body'];?>
                                </div>

                                <footer class="footer-post">
                                    <hr>
                                    <div class="grb-post btn-group" role="group" aria-label="">
                                        <button type="button" class="btn btn-primary">Like</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                        <button type="button" class="btn btn-primary">Report</button>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                        <!-- de nghi dung khung khac ko dung media -->
                    <?php endforeach;?>
                    
                    <br>
                    <br>
                    phan trang o day
                    <br>
                    <br>
                    <div class="reply-layout container">
                        <div class="row">
                            <div class="cell-user col-md-2 border border-success">
                                <img src="assets/images/img1.jpeg" alt="" class="img-thumbnail rounded-circle">
                                <div class="user-info">
                                    <!-- lay thong tin ve user!!! -->
                                    <div class="user-name">gigido</div>
                                    <div class="role">member</div>
                                    <div class="created-at">ngay tham gia</div>
                                    <div class="link-fb">link gi do</div>
                                </div>
                            </div>

                            <div class="comment-content col-md-10 border border-success">
                                <div class="comment-body">
                                    viet gi do
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end zone -->
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
