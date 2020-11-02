<?php include_once("path.php");
global $ROOT_PATH;
global $URL; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
            
                <div class="main-content col-md-12">
                    <!-- topic header(title) -->
                    
                    <div class="post-title">
                        <?php $data = explode(' ', $post['tags']);?>

                        <h3><?php if(count($data)>1):?><span class="<?php echo $data[0].' '.$data[1];?>"><?php echo $data[2];?></span><?php endif; echo $post['title']?></h3>
                        <div class="post-info">
                            <span>Posted by: <?php echo $user['username']?></span>
                            <span>Create at: <?php echo $post['create_at']?></span>
                        </div>
                    </div>
                    
                    <div class="post-layout container">
                        <div class="row post">
                            <div class="cell-user col-md-2">
                            
                                <img src="<?php echo $BASE_URL.'/assets/images/avt/'.$user['avt'];?>" alt="" class="img-thumbnail avatar rounded-circle mx-auto d-block" >
                                <div class="user-info">
                                    <div class="user-name"><a href="<?php echo $URL;?>users&action=index&u_id=<?php echo $user['user_id'];?>"><?php echo $user['fullname'];?></a></div>
                                    <div class="role"><?php $role=$user['admin']==1?"Quản trị viên":"Thành viên"; echo $role;?></div>
                                    <div class="created-at">Ngày tham gia:<?php echo $user['create_at'];?></div>
                                    <span class="badge badge-success">Tác giả</span>
                                </div>
                            </div>

                            <div class="post-content col-md-10">
                                <div class="post-body">
                                    <?php echo html_entity_decode($post['body'])?>
                                </div>

                                <footer class="footer-post">
                                    <hr>
                                    <?php if($post['edit_at']!=NULL):?>
                                    <span>Edited at: <?php echo $post['edit_at'];?></span>
                                    <?php endif;?>
                                    <div class="grb-post btn-group" role="group" aria-label="">
                                    <!-- if isset id=post id -->
                                        <?php if(isset($_SESSION['id'])&&($_SESSION['id']==$post['user_id']||$_SESSION['admin']==1)):?>
                                        <!-- k thi thoi -->
                                        <a name="" id="" class="btn btn-primary" href="<?php echo $BASE_URL."/index.php?controller=posts&action=delete_p&p_id=".$post['post_id'];?>" role="button" onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')">Delete</a>
                                        <a class="btn btn-primary" href="<?php echo $BASE_URL."/index.php?controller=posts&action=edit_p&p_id=".$post['post_id'];?>" role="button">Edit</a>
                                        <?php endif;?>
                                        <!-- <button type="button" class="btn btn-primary">Like</button>
                                        <button type="button" class="btn btn-primary">Reply</button> -->
                                        <!-- <button type="button" class="btn btn-primary">Report</button> -->
                                        
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                                        Report
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">

                                                <form action="" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <input type="hidden" name="post_id" value="<?php echo $p_id;?>">
                                                    <input type="hidden" name="cm_id" value="">
                                                    <input type="hidden" name="us_reported_id" value="<?php echo $_SESSION['id'];?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                          <label for="content">Lý do</label>
                                                          <input type="text" class="form-control" name="content" aria-describedby="helpId" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="add_report" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>

<!-- COMMENTS -->
                    <?php foreach ($comments as $key=>$comment):?>
                    <div><br> <?php echo $comment['cm_id'];?></div>
                    
                    <div class="comment-layout container <?php echo "cmt_id".$comment['cm_id'];?>">
                        <div class="row post">
                            <div class="cell-user col-md-2">
                                <img src="<?php echo $BASE_URL.'/assets/images/avt/'.$us_comment[$key]['avt'];?>" alt="" class="img-thumbnail avatar rounded-circle mx-auto d-block">
                                <div class="user-info">
                                    <!-- lay thong tin ve user!!! -->
                                    <div class="user-name"><a href="<?php echo $URL;?>users&action=index&u_id=<?php echo $us_comment[$key]['user_id'];?>"><?php echo $us_comment[$key]['fullname'];?></a></div>
                                    <div class="role"><?php $role=$us_comment[$key]['admin']==1?"Quản trị viên":"Thành viên"; echo $role;?></div>
                                    <div class="created-at">Ngày tham gia:<?php echo $us_comment[$key]['create_at'];?></div>
                                </div>
                            </div>

                            <div class="comment-content col-md-10">
                                <div class="comment-body">
                                    <?php echo html_entity_decode($comment['body']);?>
                                </div>

                                <footer class="footer-post">
                                    <hr>
                                    <?php if($comment['edit_at']!==NULL):?>
                                        <span>Edited at: <?php echo $comment['edit_at'];?></span>
                                    <?php endif;?>
                                    <div class="grb-post btn-group" role="group" aria-label="">
                                        <!-- check cai gi do trc da -->
                                        <?php if(isset($_SESSION['id'])&&$_SESSION['id']==$comment['user_id']):?>
                                        <a class="btn btn-primary" href="<?php echo $BASE_URL."/index.php?controller=posts&action=delete_c&cm_id=".$comment['cm_id'];?>" role="button" onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')">Delete</a>
                                        <button type="button" class="btn btn-primary" onclick=Edit_Cm(<?php echo $comment['cm_id'];?>,<?php echo $comment['post_id'];?>)>Edit</button>
                                        <?php endif;?>
                                        <!-- <button type="button" class="btn btn-primary">Like</button>
                                        <button type="button" class="btn btn-primary">Reply</button> -->
                                        <!-- <button type="button" class="btn btn-primary">Report</button> -->

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo "#modelId".$comment['cm_id']; ?>">
                                        Report
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo "modelId".$comment['cm_id'];?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">

                                                <form action="" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <input type="hidden" name="post_id" value="<?php echo $p_id;?>">
                                                    <input type="hidden" name="cm_id" value="<?php echo $comment['cm_id'];?>">
                                                    <input type="hidden" name="us_reported_id" value="<?php echo $_SESSION['id'];?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $us_comment[$key]['user_id'];?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                          <label for="content">Lý do</label>
                                                          <input type="text" class="form-control" name="content" aria-describedby="helpId" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="add_report" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                                </form>

                                            </div>
                                        </div>

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
                    <?php include($ROOT_PATH . "/supports/message.php");?>
                    <?php if(isset($_SESSION['id'])):?>
                    <div class="reply-layout container">
                        <div class="row post">
                            <div class="cell-user col-md-2">
                                <img src="<?php echo $BASE_URL.'/assets/images/avt/'.$_SESSION['avt'];?>" alt="" class="img-thumbnail rounded-circle">
                                <div class="user-info">
                                    <!-- lay thong tin ve user!!! -->
                                    <div class="user-name"><a href="<?php echo $URL;?>users&action=index&u_id=<?php echo $_SESSION['id'];?>"><?php echo $_SESSION['username'];?></a></div>
                                    <div class="role"><?php $role=$_SESSION['admin']==1?"Quản trị viên":"Thành viên"; echo $role;?></div>
                                    <div class="created-at"><?php echo $_SESSION['create_at'];?></div>
                                    
                                </div>
                            </div>

                            <div class="comment-content col-md-10">
                                <div class="comment-body">
                                    <form id="add_cmt" action="<?php echo $BASE_URL."/index.php?controller=posts&action=addComment&p_id=".$post['post_id'];?>" method="post">                                              
                                        <?php include($ROOT_PATH . "/supports/formErrors.php");?>
                                        
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['id'];?>">
                                        <input type="hidden" class="form-control" name="post_id" value="<?php echo $post['post_id'];?>">
                                        <div class="form-group">
                                          <textarea id="body" name="body" cols="10"></textarea>
                                                
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
