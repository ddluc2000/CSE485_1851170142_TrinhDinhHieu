<?php include_once("path.php");
global $ROOT_PATH; 
global $URL;?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
<title>Forum CSE</title>
<link rel="stylesheet" href="assets/css/admin.css">
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<?php include($ROOT_PATH."/includes/admin_headerp3.php");?>
<!-- VIET BODY LUON O DAY -->
                <div class="col-md-10">
                    <h2 class="text-center">Quản lý Users</h2>
                    <?php include($ROOT_PATH . "/supports/message.php");?>
                    <div class="list-posted">

                    <form action="<?php echo $URL."admin&action=users_index";?>" method="post">
                        <div class="btn-group float float-left" role="group" aria-label="">
                            <a class="btn btn-primary" href="<?php echo $URL."admin&action=add_user"?>" role="button">Add</a>
                            <button type="submit" class="btn btn-primary">Manage</button>
                            <button type="submit" name="del_us" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn xóa những tài khoản đã chọn?')">Delete</button>
                        </div>
                        <div class="d-flex float float-right">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="clearfix"></div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th><input type="checkbox" class="checkall" onclick="check()"></th>
                                    <th>Stt</th>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Create_at</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th colspan="4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key=>$user):?>
                                    <tr>
                                        <td scope="row"><input type="checkbox" class="cb1" name="us_id[]" value="<?php echo $user['user_id'];?>"></td>
                                        <td><?php echo $key+1;?></td>
                                        <td><?php echo $user['fullname'];?></td>
                                        <td><a href="<?php echo $URL."users&action=index&u_id=".$user['user_id'];?>"><?php echo $user['username'];?></a></td>
                                        <td><?php echo $user['email'];?></td>
                                        <td><?php echo $user['create_at'];?></td>
                                        <td><?php echo $user['admin'];?></td>
                                        <td><?php echo $user['status'];?></td>
                                        <td><a href="<?php echo $URL."admin&action=edit_user&u_id=".$user['user_id'];?>">Edit</a></td>
                                        <td><a href="<?php echo $URL."users&action=del&u_id=".$user['user_id'];?>" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">Delete</a></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </form>
                        <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
