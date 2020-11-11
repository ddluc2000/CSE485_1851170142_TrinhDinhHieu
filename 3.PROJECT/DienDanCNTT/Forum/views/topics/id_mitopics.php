<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Mini-Topic</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="main-content col-md-12">
                    <!-- topic header(title) -->
                    <div class="topic-title">
                        <h3><?php echo $mtpname['title'];?></h3>
                        <?php include($ROOT_PATH . "/supports/message.php");?>
                    </div>

                        <!-- de nghi dung khung khac ko dung media -->
                        <div class="mitopic block-container">
                            <!-- body zone -->
                            <div class="block-body">   
                            <br>
                            <!-- nut dieu huong o day -->
                            <?php if($mtpname['status']&&isset($_SESSION['id'])):?>
                            <a name="" class="btn btn-primary" href="<?php echo $BASE_URL."/index.php?controller=posts&action=create&mtp_id=".$data['mitopic_id'];?>" role="button">Create Post</a>
                            <br>
                            <?php endif;?>
                            <br>
                            <div class="post-body-tp">
                            <!-- post -->
                                <?php foreach ($posts as $post):?>
                                <?php $data = explode(' ', $post['tags']);?>
                                <div class="post-content-tp d-flex">
                                    <img src="<?php echo $BASE_URL.'/assets/images/avt/'.$post['avt'];?>" alt="123" class="avt-tp rounded-circle">
                                    <div class="post-tp">
                                        <div class="post-title-tp"><a href="<?php echo $BASE_URL."/index.php?controller=posts&action=index&p_id=".$post['post_id'];?>"><?php if(count($data)>1):?><span class="<?php echo $data[0].' '.$data[1];?>"><?php echo $data[2];?></span><?php endif;?><?php echo $post['title'];?></a></div>
                                        <div class="post-info-tp">
                                    
                                    <!-- chen gi do cua post o day -->
                                            <?php echo $post['username'];?>
                                            <?php echo $post['create_at'];?>
                                        </div>
                                    </div>
                                    <div class="statics">
                                        Lượt xem : <?php echo $post['views'];?>
                                        Lượt trả lời: <?php echo $post['replys'];?>
                                    </div>
                                </div>
                                <?php endforeach;?> 
                                </div>

                            </div>
                            <!-- end bodyzone -->
                        </div>
                        <!-- end zone -->
                    
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
