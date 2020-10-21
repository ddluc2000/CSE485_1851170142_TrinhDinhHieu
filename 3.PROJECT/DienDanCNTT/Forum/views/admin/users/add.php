<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
<title>Forum CSE</title>
<link rel="stylesheet" href="assets/css/admin.css">
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<?php include($ROOT_PATH."/includes/admin_headerp3.php");?>
<!-- VIET BODY LUON O DAY -->
                <div class="col-md-10">
                    <h2 class="text-center">Add Users</h2>
                    <form action="<?php echo $URL."admin&action=add_user";?>" method="post">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" name="username" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="fullname">Fullname</label>
                          <input type="text" class="form-control" name="fullname" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="conf_pass">Confirm Pass</label>
                          <input type="password" class="form-control" name="conf_pass" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="Role">Role</label>
                          <select class="form-control" name="admin">
                            <option>Thành viên</option>
                            <option>Quản trị viên</option>
                          </select>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="status" value="1" checked>
                            Active
                          </label>
                        </div>
                        <button type="submit" name="add_user" class="btn btn-primary">Add</button>

                    </form> 
                </div>

            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
