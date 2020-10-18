<?php
require_once 'models/ZoneModel.php';
require_once 'models/TopicModel.php';
require_once 'models/MitopicModel.php';
class ParentCTL
{
  public function index()
  {
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book
    $zoneModel = new ZoneModel();
    $zones = $zoneModel->selectAll();

    // PA1: LAY TAT SO SANH SAU
    $topicModel = new TopicModel();
    $topics = $topicModel->selectAll();

    $mitopicModel = new MitopicModel();
    $mitopics= $mitopicModel->selectAll();

    // PA2: de xuat voi moi zone thi lay mot mang topic rieng.

    // $topics=array();
    // foreach($zones as $key=>$zone){
    //     $i=$key;
    //     $topicModel = new TopicModel();
    //     $topics[$i]=$topicModel->selectAll(['zone_id'=>$zone['zone_id']]);
        
    // }
    
    // DONE



    
    //import file view tương ứng, xử lý biến $books tại view này
    require_once 'views/home.php';
  }
}

?>