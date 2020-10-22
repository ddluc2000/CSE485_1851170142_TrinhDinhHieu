<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <?php include($ROOT_PATH . "/supports/message.php");?>
        <div class="slider container">
            <h1> Quang cao gi do o day hoac bai viet quan trong</h1>
        </div>
        
        <div class="main-page container">
            <div class="row">
                <div class="main-content col-md-12">
                    <?php foreach ($zones as $zone):?>
                        <!-- de nghi dung khung khac ko dung media -->
                        <div class="zone block-container border border-success">
                            <!-- header zone -->
                            <div class="block-header border-bottom border-warning">
                            <h5><?php echo $zone['title'];?></h5>
                            <p><?php echo $zone['description']; ?></p>
                            </div>
                            <!-- body zone -->
                            <div class="block-body ">
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
