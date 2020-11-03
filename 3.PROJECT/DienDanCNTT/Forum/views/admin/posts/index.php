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
                    <h2 class="text-center">Quản lý Posts</h2>
                    <?php include($ROOT_PATH . "/supports/message.php");?>
                    <div class="list-posted">

                    <form action="<?php echo $URL."admin&action=posts_index"?>" method="post">
                        <div class="btn-group float float-left" role="group" aria-label="">
                            <button type="submit" class="btn btn-primary">Manage</button>
                            <button type="submit" name="del_post" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn xóa những post đã chọn?')">Delete</button>
                            <button type="submit" name="close_post" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn đóng những post đã chọn?')">Close</button>
                        </div>

                        <div class="d-flex float float-right">
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
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Create_at</th>
                                    <th>Tags</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $key=>$post):?>
                                    <tr>
                                        <td scope="row"><input type="checkbox" name="p_id[]" value="<?php echo $post['post_id'];?>"></td>
                                        <td><?php echo $key+1;?></td>
                                        <td><a href="<?php echo $URL."posts&action=index&p_id=".$post['post_id'];?>"><?php echo $post['title'];?></a></td>
                                        <?php foreach ($users as $user):?>
                                            <?php if($user['user_id']==$post['user_id']):?>
                                            <td><a href="<?php echo $URL."users&action=index&u_id=".$user['user_id'];?>"><?php echo $user['username'];?></a></td>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                        <td><?php echo $post['create_at'];?></td>
                                        <td><?php echo $post['tags'];?></td>
                                        <?php if($post['status']):?>
                                        <td><a href="<?php echo $URL."admin&action=close_p&p_id=".$post['post_id'];?>" onclick="return confirm('Bạn có chắc muốn đóng bài viết này?')">Close</a></td>
                                        <?php else:?>
                                        <td><a href="<?php echo $URL."admin&action=open_p&p_id=".$post['post_id'];?>" style="color:brown;">ReOpen</a></td>
                                        <?php endif;?>
                                        <td><a href="<?php echo $URL."admin&action=del_p&p_id=".$post['post_id'];?>" onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')">Delete</a></td>
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
