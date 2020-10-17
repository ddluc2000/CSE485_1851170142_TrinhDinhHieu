<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="main-page container">
        <div class="row">
            <div class="main-content col-md-12">
                <!-- topic header(title) -->
                <div class="topic-title">
                    <h3>Topic nao do!</h3>
                </div>

                    <!-- de nghi dung khung khac ko dung media -->
                    <div class="zone block-container border border-success">
                        <!-- body zone -->
                        <div class="block-body">
                            <?php foreach ($mitopics as $mitopic):?>
                            <div class="mtopic-content border border-warning">
                                <span><i class="far fa-comments icon"></i></span>
                                <?php echo $mitopic['title'];?>
                            </div>      
                            <?php endforeach;?>   
                            <div class="post-body border border-success">
                            <!-- post -->
                                <?php foreach ($posts as $post):?>
                                <?php if($post['mitopic_id']===NULL):?>
                                <div class="post-content">
                                    <div class="post-title"><?php echo $post['title'];?></div>
                                    <div class="post-info">
                                    <!-- chen gi do cua post o day -->
                                            <p><?php echo $post['tags'];?></p>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach;?> 
                            </div>

                        </div>
                          <!-- end bodyzone -->
                    </div>
                    <!-- end zone -->
                   
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
