<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="slider container">
        <h1> Quang cao gi do o day hoac bai viet quan trong</h1>
    </div>
    <div class="main-page container">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($zones as $zone):?>
                    <!-- de nghi dung khung khac ko dung media -->
                    <div class="block-container border border-success">
                        <div class="block-header border-bottom border-warning">
                        <h5><?php echo $zone['title'];?></h5>
                        <p><?php echo $zone['description']; ?></p>
                        </div>
                        <div class="block-body">

                        cac topic o day
                        </div>
                         
                    </div>
                    <!-- end zone -->
                   
                <?php endforeach;?>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
