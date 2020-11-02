<?php include_once("path.php");
global $ROOT_PATH;?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">

                        <div class="form-group">
                          <label for="title"><h3>Tiêu đề</h3></label>
                          <input type="text" class="form-control" name="title" aria-describedby="helpId" placeholder="" value="<?php echo $title?>">
                        </div>

                        <div class="form-group">
                          <label for="body">Nội dung</label>
                          <textarea class="form-control" name="body" id="body" rows="10"><?php echo $body?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="">Tags</label>
                          <select class="form-control" name="tags">
                            <option value="">None</option>
                            <option value="badge badge-primary Quest">Quest</option>
                            <option value="badge badge-success Share">Share</option>
                            <option value="badge badge-danger Warning">Warning</option>
                            <option value="badge badge-info Tuturial">Tuturial</option>
                            <option value="badge badge-warning Study">Study</option>
                          </select>
                        </div>

                        <button type="submit" name="edit_post" class="btn btn-primary">Edit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
