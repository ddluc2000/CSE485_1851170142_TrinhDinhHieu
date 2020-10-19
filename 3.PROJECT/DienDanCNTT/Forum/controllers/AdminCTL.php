<?php
require_once 'models/UserModel.php';
require_once 'models/PostModel.php';
require_once 'models/ZoneModel.php';
require_once 'models/TopicModel.php';
require_once 'models/MitopicModel.php';
class AdminCTL
{
  public function index()
  {
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book
    // $zoneModel2 = new ZoneModel();
    // $zones = $zoneModel2->selectAll();

    // // PA1: LAY TAT SO SANH SAU
    // $topicModel = new TopicModel();
    // $topics = $topicModel->selectAll();

    // $mitopicModel = new MitopicModel();
    // $mitopics= $mitopicModel->selectAll();

    // $postModel = new PostModel();
    // $posts= $postModel->selectAll();

    // $userModel = new UserModel();
    // $users = $userModel->selectAll();
    // echo "<pre>";
    // print_r($zones);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($posts);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($mitopics);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($posts);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($users);
    // echo "</pre>";
    // PA2: de xuat voi moi zone thi lay mot mang topic rieng.

    // $topics=array();
    // foreach($zones as $key=>$zone){
    //     $i=$key;
    //     $topicModel = new TopicModel();
    //     $topics[$i]=$topicModel->selectAll(['zone_id'=>$zone['zone_id']]);
        
    // }
    
    // DONE
    
    require_once 'views/dashboard.php';


    
    //import file view tương ứng, xử lý biến $books tại view này
  }
}

?>