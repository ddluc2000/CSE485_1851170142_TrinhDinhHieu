<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
<title>Forum CSE</title>
<link rel="stylesheet" href="assets/css/admin.css">
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<?php include($ROOT_PATH."/includes/admin_headerp3.php");?>
<!-- VIET BODY LUON O DAY -->
                <div class="col-md-10">
                    <h2 class="text-center">Giới thiệu</h2>
                    <?php include($ROOT_PATH . "/supports/message.php");?>
                    <form action="<?php echo $URL."admin&action=about";?>" method="post">
                        
                        <div class="form-group">
                          <label for="link_ab">Link bài viết</label>
                          <input type="text" class="form-control" name="link_ab" aria-describedby="helpId" placeholder="" value="">
                        </div>
                        <button type="submit" name="ud_about" class="btn btn-primary">Update</button>

                    </form> 
                </div>

            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
