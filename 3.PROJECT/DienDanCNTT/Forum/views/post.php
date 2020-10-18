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
                                    <?php if($post['edit_at']!=NULL):?>
                                    <span>Edited at: <?php echo $post['edit_at'];?></span>
                                    <?php endif;?>
                                    <div class="grb-post btn-group" role="group" aria-label="">
                                    <!-- if isset id=post id -->
                                        <?php if(isset($_SESSION['id'])&&($_SESSION['id']==$post['user_id']||$_SESSION['admin']==1)):?>
                                        <a class="btn btn-primary" href="<?php echo $BASE_URL."/index.php?controller=posts&action=edit_p&p_id=".$post['post_id'];?>" role="button">Edit</a>
                                        <!-- k thi thoi -->
                                        <a name="" id="" class="btn btn-primary" href="<?php echo $BASE_URL."/index.php?controller=posts&action=delete_p&p_id=".$post['post_id'];?>" role="button">Delete</a>
                                        <?php endif;?>
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
                                        <!-- check cai gi do trc da -->
                                        <?php if(isset($_SESSION['id'])&&$_SESSION['id']==$comment['user_id']):?>
                                        <a class="btn btn-primary" href="<?php echo $BASE_URL."/index.php?controller=posts&action=delete_c&cm_id=".$comment['cm_id'];?>" role="button">Delete</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                                        Edit
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sửa comment </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                          <textarea class="form-control" name="body" rows="5">Sửa gì đó</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif;?>
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
                    <?php if(isset($_SESSION['id'])):?>
                    <div class="reply-layout container">
                        <div class="row">
                            <div class="cell-user col-md-2 border border-success">
                                <img src="assets/images/img1.jpeg" alt="" class="img-thumbnail rounded-circle">
                                <div class="user-info">
                                    <!-- lay thong tin ve user!!! -->
                                    <div class="user-name"><?php echo $_SESSION['username'];?></div>
                                    <div class="role"><?php $role=$_SESSION['admin']==1?"Quản trị viên":"Thành viên"; echo $role;?></div>
                                    <div class="created-at"><?php echo $_SESSION['create_at'];?></div>
                                    <div class="link-fb">link gi do</div>
                                </div>
                            </div>

                            <div class="comment-content col-md-10 border border-success">
                                <div class="comment-body">
                                    <form method="post">                    
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['id'];?>">
                                        <input type="hidden" class="form-control" name="post_id" value="<?php echo $post['post_id'];?>">
                                        <div class="form-group">
                                          <textarea class="form-control" name="body" rows="5"></textarea>
                                        </div>
                                        <button type="submit" name="add_comment" class="btn btn-primary float float-right">Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                    <!-- end zone -->
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
