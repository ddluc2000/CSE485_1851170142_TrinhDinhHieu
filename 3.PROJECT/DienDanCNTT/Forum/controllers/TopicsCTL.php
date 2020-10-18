<?php
require_once 'models/PostModel.php';
require_once 'models/MitopicModel.php';
require_once 'models/TopicModel.php';
class TopicsCTL
{
  public function index()
  {
    if(isset($_GET['tp_id'])){
      // $_GET['tp_id'];
      $data=[
        'topic_id'=>$_GET['tp_id']
      ];
      // select by id and=>get name of tp_id
      $postModel = new PostModel();
      $posts = $postModel->getPostInTP($data['topic_id']);
      $mitopicModel = new MitopicModel();
      $mitopics= $mitopicModel->selectAll($data);
      $topicModel = new TopicModel();
      $tpname = $topicModel->getNamebyId($data['topic_id']);
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
      $mitopicModel = new MitopicModel();
      // select by id and=>get name of mtp_id
      $posts = $postModel->getPostInMTP($data['mitopic_id']);

      $mtpname = $mitopicModel->getNamebyId($data['mitopic_id']);
      require_once 'views/id_mitopics.php';
    }
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book

  }
}

?>