<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <h3>Bạn tìm kiếm từ khóa: "<?php echo $val;?>"</h3>
            <div class="topic block-container">
                        <!-- body zone -->
                        <div class="block-body">
                            <div class="post-body-tp">
                            <!-- post -->
                                <?php foreach ($posts as $post):?>
                                <?php if($post['mitopic_id']===NULL):?>
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
                                <?php endif; ?>
                                <?php endforeach;?> 
                            </div>
                        </div>
            </div>
        </div>

    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>