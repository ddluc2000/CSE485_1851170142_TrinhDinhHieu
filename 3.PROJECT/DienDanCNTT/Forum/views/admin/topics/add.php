<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
<title>Forum CSE</title>
<link rel="stylesheet" href="assets/css/admin.css">
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<?php include($ROOT_PATH."/includes/admin_headerp3.php");?>
<!-- VIET BODY LUON O DAY -->
                <div class="col-md-10">
                    <h2 class="text-center">Add Topic</h2>
                    <form action="<?php echo $URL."admin&action=add_tp";?>" method="post">
                        <label for="">Zone</label>
                        <?php if($z_id!==""):?>
                          <input type="text" name="z_id" class="form-control" value="<?php echo $z_id;?>" readonly>
                        <?php else:?>
                          <div class="form-group">
                            <select class="form-control" name="z_id" id="">
                              <?php foreach($zones as $zone):?>
                              <option value="<?php echo $zone['zone_id'];?>"><?php echo $zone['title'];?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        <?php endif;?>

                        <div class="form-group">
                          <label for="title">Topic Title</label>
                          <input type="text" class="form-control" name="title" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <input type="text" class="form-control" name="description" aria-describedby="helpId" placeholder="">
                        </div>
                        <button type="submit" name="add_topic" class="btn btn-primary">Add</button>
                    </form> 
                </div>

            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
