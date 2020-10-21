<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
<title>Forum CSE</title>
<link rel="stylesheet" href="assets/css/admin.css">
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<?php include($ROOT_PATH."/includes/admin_headerp3.php");?>
<!-- VIET BODY LUON O DAY -->
                <div class="col-md-10">
                    <h2 class="text-center">Quản lý Topics</h2>
                    
                    <div class="list-posted">
                        <div class="btn-group float float-left" role="group" aria-label="">
                            <a class="btn btn-primary" href="<?php echo $URL."admin&action=add_tp";?>" role="button">Add</a>
                            <button type="button" class="btn btn-primary">Manage</button>
                            <button type="button" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-primary">Delete</button>
                        </div>
                        <form action="" class="d-flex float float-right" method="post">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </form>
                        <div class="clearfix"></div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>
                                    <input type="checkbox" name="" id="">
                                    </th>
                                    <th>Stt</th>
                                    <th>Title</th>
                                    <th>Info cac thu</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($topics as $key=>$topic):?>
                                    <tr>
                                        <td scope="row"><input type="checkbox" name=""></td>
                                        <td><?php echo $key;?></td>
                                        <td><a href="<?php echo $URL."admin&action=view_tp&tp_id=".$topic['topic_id'];?>"><?php echo $topic['title'];?></a></td>
                                        <td><?php echo $topic['description'];?></td>
                                        <td><a href="#">Edit</a></td>
                                        <td><a href="<?php echo $URL."admin&action=del_tp&tp_id=".$topic['topic_id'];?>">Delete</a></td>
                                    </tr>
                                    <?php $i=0;?>
                                    <?php foreach ($mitopics as $mitopic):?>
                                        <?php if($mitopic['topic_id']==$topic['topic_id']):?>
                                        <tr class="trchild">
                                            <td scope="row"><input type="checkbox" name=""></td>
                                            <td><?php echo $i++;?></td>
                                            <td><a href="<?php echo $URL."admin&action=view_tp&mtp_id=".$mitopic['mitopic_id'];?>"><?php echo $mitopic['title'];?></a></td>
                                            <td><?php echo $mitopic['description'];?></td>
                                            <td><a href="#">Edit</a></td>
                                            <td><a href="<?php echo $URL."admin&action=del_mtp&mtp_id=".$mitopic['mitopic_id'];?>">Delete</a></td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                <?php endforeach;?>
                            </tbody>
                        </table>

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
