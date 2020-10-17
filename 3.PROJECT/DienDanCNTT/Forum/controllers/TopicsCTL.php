<?php
require_once 'models/PostModel.php';
require_once 'models/MitopicModel.php';
class TopicsCTL
{
  public function index()
  {
    if(isset($_GET['tp_id'])){
      // $_GET['tp_id'];
      $data=[
        'topic_id'=>$_GET['tp_id']
      ];
      $postModel = new PostModel();
      $posts = $postModel->selectAll($data);
      $mitopicModel = new MitopicModel();
      $mitopics= $mitopicModel->selectAll($data);
  
      require_once 'views/id_topics.php';
    }
  }

  public function mtp_index()
  {
    if(isset($_GET['mtp_id'])){
      // $_GET['tp_id'];
      $data=[
        'mitopic_id'=>$_GET['mtp_id']
      ];
      $postModel = new PostModel();
      $posts = $postModel->selectAll($data);
  
      require_once 'views/id_mitopics.php';
    }
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book

  }
}

?>