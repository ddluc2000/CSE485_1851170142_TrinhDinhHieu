<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="col-md-3"></div>

                <div class="main-content col-md-4">
                    <form method="post">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" name="username" aria-describedby="helpId" placeholder="" value="<?php echo $username;?>">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" aria-describedby="helpId" placeholder="">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
                
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
