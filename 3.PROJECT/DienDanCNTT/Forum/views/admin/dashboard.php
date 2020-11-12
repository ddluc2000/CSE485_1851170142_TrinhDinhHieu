<?php include_once("path.php");
global $ROOT_PATH; ?>
<link rel="stylesheet" href="assets/css/admin.css">
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<?php include($ROOT_PATH."/includes/admin_headerp3.php");?>
<!-- VIET BODY LUON O DAY -->
              <div class="col-md-10">
                    <h2 class="text-center">Quản lý Zones</h2>
                    <?php include($ROOT_PATH . "/supports/message.php");?>
                    <div class="list-posted">

                    <form action="<?php echo $URL."admin&action=zones_index";?>" method="post">
                        <div class="btn-group float float-left" role="group" aria-label="">
                            <a class="btn btn-primary" href="<?php echo $URL."admin&action=add_zone"?>" role="button">Add</a>
                            <button type="submit" class="btn btn-primary">Manage</button>
                            <button type="submit" class="btn btn-primary" name="del_zone" onclick="return confirm('Bạn có chắc muốn xóa những zone đã chọn?')">Delete</button>
                            
                        </div>
                        <div class="d-flex float float-right">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        
                        <!-- <div class="clearfix"></div> -->

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>
                                    <input type="checkbox" class="checkall" onclick="check()">
                                    </th>
                                    <th>Stt</th>
                                    <th>Title</th>
                                    <th>Info cac thu</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($zones as $key=>$zone):?>
                                    <tr>
                                        <td scope="row">
                                            <input type="checkbox" name="z_id[]" class="cb1" value="<?php echo $zone['zone_id'];?>">
                                            </td>
                                        <td><?php echo $key+1;?></td>
                                        <td><a href="<?php echo $URL."admin&action=view_z&z_id=".$zone['zone_id'];?>"><?php echo $zone['title'];?></a></td>
                                        <td><?php echo $zone['description'];?></td>
                                        <td><a href="<?php echo $URL."admin&action=edit_zone&z_id=".$zone['zone_id'];?>">Edit</a></td>
                                        <td><a href="<?php echo $URL."admin&action=del_z&z_id=".$zone['zone_id'];?>" onclick="return confirm('Bạn có chắc muốn xóa zone này?')">Delete</a></td>
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
