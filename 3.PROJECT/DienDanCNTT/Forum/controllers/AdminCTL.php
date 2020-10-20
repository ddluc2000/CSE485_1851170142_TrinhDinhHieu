<?php
require_once 'models/UserModel.php';
require_once 'models/PostModel.php';
require_once 'models/ReportModel.php';
require_once 'models/ZoneModel.php';
require_once 'models/TopicModel.php';
require_once 'models/MitopicModel.php';
class AdminCTL
{
  public function index()
  {
    global $URL;
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book
    $zoneModel2 = new ZoneModel();
    $zones = $zoneModel2->selectAll();

    // // PA1: LAY TAT SO SANH SAU
    // $topicModel = new TopicModel();
    // $topics = $topicModel->selectAll();

    // $mitopicModel = new MitopicModel();
    // $mitopics= $mitopicModel->selectAll();

    // $postModel = new PostModel();
    // $posts= $postModel->selectAll();

    // $userModel = new UserModel();
    // $users = $userModel->selectAll();

    // DONE
    
    require_once 'views/admin/dashboard.php';
  }

  public function zones_index(){

    $zoneModel = new ZoneModel();
    $zones = $zoneModel->selectAll();
    require_once 'views/admin/dashboard.php';
  }

  public function topics_index(){
    global $URL;
    $topicModel = new TopicModel();
    $topics = $topicModel->selectAll();
    
    $mitopicModel = new MitopicModel();
    $mitopics= $mitopicModel->selectAll();
    require_once 'views/admin/topics/index.php';
  }

  public function posts_index(){
    global $URL;
    $postModel = new PostModel();
    $posts = $postModel->selectAll();
    $userModel = new UserModel();
    $users = $userModel->selectAll();
    require_once 'views/admin/posts/index.php';
  }

  public function users_index(){
    global $URL;
    $userModel = new UserModel();
    $users = $userModel->selectAll();
    require_once 'views/admin/users/index.php';
  }

  public function reports_index(){
    global $URL;
    $reportModel = new ReportModel();
    $reports = $reportModel->selectAll();
    $userModel = new UserModel();
    $users = $userModel->selectAll();
    require_once 'views/admin/reports/index.php';
  }

  public function view_tp(){
    global $URL;
    $postModel = new PostModel();
    $userModel = new UserModel();
    $users = $userModel->selectAll();
    if(isset($_GET['tp_id'])){
      $tp_id=$_GET['tp_id'];
      $posts=$postModel->getPostInTP($tp_id);
      require_once 'views/admin/posts/index.php';
    }
    else
    if(isset($_GET['mtp_id'])){
      $mtp_id=$_GET['mtp_id'];
      $posts=$postModel->getPostInMTP($mtp_id);
      require_once 'views/admin/posts/index.php';
    }
  }

  public function view_z(){
    global $URL;
    $topicModel = new TopicModel();
    if(isset($_GET['z_id'])){
      $z_id=$_GET['z_id'];
      $mitopicModel = new MitopicModel();
      $mitopics= $mitopicModel->selectAll();
      $topics=$topicModel->getTpInZn($z_id);
      require_once 'views/admin/topics/index.php';
    }
  }

}

?>