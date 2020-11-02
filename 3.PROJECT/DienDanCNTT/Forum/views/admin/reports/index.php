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
                    <h2 class="text-center">Quản lý Reports</h2>
                    
                    <div class="list-posted">

                    <form action="<?php echo $URL."admin&action=reports_index";?>" method="post">

                        <div class="btn-group float float-left" role="group" aria-label="">
                            <button type="button" class="btn btn-primary">Manage</button>
                            <button type="submit" name="del_rp" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn xóa những báo cáo đã chọn?')">Delete</button>
                        </div>

                        <div action="" class="d-flex float float-right">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="clearfix"></div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>
                                    <input type="checkbox" name="" id="">
                                    </th>
                                    <th>Stt</th>
                                    <th>User</th>
                                    <th>Content</th>
                                    <th>Post ID</th>
                                    <th>Comment ID</th>
                                    <th>Sender</th>
                                    <th>Time</th>
                                    <th colspan="4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reports as $key=>$report):?>
                                    <?php foreach($users as $user){
                                        if($user['user_id']==$report['user_id']) $user_id=$user;
                                        if($user['user_id']==$report['us_reported_id']) $us_reported_id=$user;
                                    }?>
                                    <tr>
                                        <td scope="row"><input type="checkbox" name="rp_id[]" value="<?php echo $report['rp_id'];?>"></td>
                                        <td><?php echo $key+1;?></td>
                                        <td><a href="<?php echo $URL."users&action=index&u_id=".$user_id['user_id'];?>"><?php echo $user_id['username'];?></a></td>
                                        <td><?php echo $report['content'];?></td>
                                        <td><?php echo $report['post_id'];?></td>
                                        <td><?php echo $report['cm_id'];?></td>
                                        <td><a href="<?php echo $URL."users&action=index&u_id=".$us_reported_id['user_id'];?>"><?php echo $us_reported_id['username'];?></a></td>
                                        <td><?php echo $report['create_at'];?></td>
                                        <td><a href="#">Done</a></td>
                                        <td><a href="<?php echo $URL."admin&action=del_rp&rp_id=".$report['rp_id'];?>" onclick="return confirm('Bạn có chắc muốn xóa báo cáo này?')">Delete</a></td>
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
