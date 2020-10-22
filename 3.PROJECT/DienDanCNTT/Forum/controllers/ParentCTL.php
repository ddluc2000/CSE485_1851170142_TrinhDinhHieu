<?php
require_once 'models/UserModel.php';
require_once 'models/PostModel.php';
require_once 'models/CommentModel.php';
require_once 'models/ReportModel.php';
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

    // require_once 'views/test.php';
    require_once 'views/home.php';
  }

  function del_p($p_id=''){
    $postModel = new PostModel();
    $postModel2 = new PostModel();
    {
      $post=$postModel->getOne($p_id);
          $commentModel = new CommentModel();
          $commentModel->deleteAll($post['post_id']);
          $postModel2->delete($post['post_id']);
    }
  }

  // CHUA KE THUA HAM TREN
  function del_mtp($mtp_id=''){
    $mitopicModel = new MitopicModel();
      $mitopic=$mitopicModel->getOne($mtp_id);
      $postModel = new PostModel();
      $data=['mitopic_id'=>$mitopic['mitopic_id']];
      $posts=$postModel->selectAll($data);
        foreach($posts as $post){
          $commentModel = new CommentModel();
          $commentModel->deleteAll($post['post_id']);
          $postModel2 = new PostModel();
          $postModel2->delete($post['post_id']);
        }
      $mitopicModel2 = new MitopicModel();
      $mitopicModel2->delete($mitopic['mitopic_id']);
  }

  // CHUA KE THUA CAC HAM TREN
  function del_tp($tp_id=''){
    $topicModel = new TopicModel();
      $topic=$topicModel->getOne($tp_id);
      $data=['topic_id'=>$topic['topic_id']];
      $postModel = new PostModel();
      $posts=$postModel->selectAll($data);
        foreach($posts as $post){
          $commentModel = new CommentModel();
          $commentModel->deleteAll($post['post_id']);
          $postModel2 = new PostModel();
          $postModel2->delete($post['post_id']);
        }

        $mitopicModel = new MitopicModel();
        $mitopics=$mitopicModel->selectAll($data);
        foreach($mitopics as $mitopic){
          $mitopicModel2 = new MitopicModel();
          $mitopicModel2->delete($mitopic['mitopic_id']);
        }

      $topicModel2 = new TopicModel();
      $topicModel2->delete($topic['topic_id']);
  }

  // KE THUA RUT NGAN TIME RAT NHIEU
  function del_z($z_id){
    $topicModel = new TopicModel();
    $data=['zone_id'=>$z_id];
    $topics=$topicModel->selectAll($data);
      foreach($topics as $topic){
        $this->del_tp($topic['topic_id']);
      }
    $zoneModel = new ZoneModel();
    $zoneModel->delete($z_id);
  }

}

?>