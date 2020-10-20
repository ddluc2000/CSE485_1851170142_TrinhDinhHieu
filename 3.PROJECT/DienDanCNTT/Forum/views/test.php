<tr>
                                        <td scope="row"><input type="checkbox" name=""></td>
                                        <td><?php echo $key;?></td>
                                        <td><a href="<?php echo $URL."admin&action=view_tp&tp_id=".$topic['topic_id'];?>"><?php echo $topic['title'];?></a></td>
                                        <td><?php echo $topic['description'];?></td>
                                        <td><a href="#">Edit</a></td>
                                        <td><a href="#">Delete</a></td>
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
                                            <td><a href="#">Delete</a></td>
                                        </tr>
                                        <?php endif; ?>
                                    
                                    <?php endforeach;?>