<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <?php include($ROOT_PATH . "/supports/message.php");?>
        <ul class="nav nav-tabs preview container">
            <li class="nav-item nav-bar home">
                <a class="nav-link active" href="#">Trang chủ</a>
            </li>
            <li class="nav-item nav-bar newest">
                <a class="nav-link" href="#">Bài viết mới</a>
            </li>
        </ul>
        <div class="post-new" style="display:none">
            <ul class="list-group container">
                <?php foreach($posts as $post):?>
                <li class="list-group-item">
                <i class="fab fa-gripfire icon-new"></i><a href="<?php echo $URL."posts&action=index&p_id=".$post['post_id'];?>"><?php echo $post['title'];?></a>
                <br>
                <a class="author" href="<?php echo $URL."users&action=index&u_id=".$post['user_id'];?>"><?php echo $post['username'];?></a> <span><?php echo $post['create_at'];?></span>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="slider container">
            <img src="assets/images/background.jpg" alt="">
        </div>
        
        <div class="main-page container">
            <div class="row">
                <div class="main-content col-md-12">
                    <?php foreach ($zones as $zone):?>
                        <!-- de nghi dung khung khac ko dung media -->
                        <div class="zone block-container">
                            <!-- header zone -->
                            <div class="block-header rounded-top">
                            <h5><?php echo $zone['title'];?></h5>
                            <span><i><?php echo $zone['description']; ?></i></span>
                            </div>
                            <!-- body zone -->
                            <div class="ztopic-body block-body">
                            <?php foreach ($topics as $topic):?>
                            <?php if($topic['zone_id']===$zone['zone_id']):?>
                                <div class="topic-content">
                                    <span><i class="far fa-comments icon"></i></span>
                                    <div class="topic-body">
                                        <div class="topic-title"><h5><a href="<?php echo $BASE_URL."/index.php?controller=topics&action=index&tp_id=".$topic['topic_id'];?>"><?php echo $topic['title'];?></a></h5></div>
                                        <?php foreach ($mitopics as $mitopic):?>
                                            <?php if($mitopic['topic_id']===$topic['topic_id']):?>
                                                <div class="mtopic-tt">
                                                    <span><i class="far fa-comments m-icon"></i></span>
                                                    <a href="<?php echo $BASE_URL."/index.php?controller=topics&action=mtp_index&mtp_id=".$mitopic['mitopic_id'];?>"><?php echo $mitopic['title'];?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    </div>                
                                </div>
                            <?php endif; ?>
                            <?php endforeach;?>
                            </div>
                            <!-- end bodyzone -->
                        </div>
                        <!-- end zone -->
                    
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
