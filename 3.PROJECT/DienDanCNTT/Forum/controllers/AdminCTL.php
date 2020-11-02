<?php
require_once 'models/UserModel.php';
require_once 'models/PostModel.php';
require_once 'models/CommentModel.php';
require_once 'models/ReportModel.php';
require_once 'models/ZoneModel.php';
require_once 'models/TopicModel.php';
require_once 'models/MitopicModel.php';
require_once 'models/OtherModel.php';
require_once 'controllers/ParentCTL.php';

class AdminCTL extends ParentCTL
{
  public function index()
  {
    global $URL;
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book
    $zoneModel2 = new ZoneModel();
    $zones = $zoneModel2->selectAll();
    require_once 'views/admin/dashboard.php';
  }

  public function del_z($z_id=''){
    global $URL;
    if(isset($_GET['z_id'])){
      $z_id=$_GET['z_id'];
    }
    $parentCTL= new ParentCTL();
    $parentCTL->del_z($z_id);
    header("location:".$URL."admin&action=zones_index");
  }

  public function zones_index(){
    global $URL;
    if(isset($_POST['del_zone'])){
      foreach($_POST['z_id'] as $z_id){
        $this->del_z($z_id);
      }
    }
    $zoneModel = new ZoneModel();
    $zones = $zoneModel->selectAll();
    require_once 'views/admin/dashboard.php';
  }



  public function add_zone(){
    global $URL;
    if(isset($_POST['add_zone'])){
      $zoneModel = new ZoneModel($_POST['title'],$_POST['description']);
      $zoneModel->create();
      // set session message gi do
      header("location:".$URL."admin&action=zones_index");
      // UserModel($username='',$fullname='',$email='',$password='',$admin='',$status)
      // tra view nao do
    }
    else
    require_once 'views/admin/zones/add.php';
  }

  public function edit_zone(){
    global $URL;
    $z_id='';
    if(isset($_POST['edit_zone'])){
      $zoneModel = new ZoneModel($_POST['title'],$_POST['description']);
      $zoneModel->update($_POST['zone_id']);
      // set session message gi do
      header("location:".$URL."admin&action=zones_index");
      // UserModel($username='',$fullname='',$email='',$password='',$admin='',$status)
      // tra view nao do
    }
    else
    if(isset($_GET['z_id'])){
      $z_id=$_GET['z_id'];
    require_once 'views/admin/zones/edit.php';
    }
  }

  // TOPICCCC
  public function topics_index(){
    global $URL;
    if(isset($_POST['del_tp'])){
      unset($_POST['del_tp']);
      if(isset($_POST['tp_id'])){
      foreach($_POST['tp_id'] as $tp_id){
        parent::del_tp($tp_id);
        }
      }
      if(isset($_POST['mtp_id'])){
        foreach($_POST['mtp_id'] as $mtp_id){
          parent::del_mtp($mtp_id);
          }
      }
      header("refresh:0");
    }
    else
    if(isset($_POST['update_tp'])){
      unset($_POST['update_tp']);
      if(isset($_POST['tp_id'])){
        $tp=$_POST['tp_id'];
        if(count($tp)>0) $this->update_tp($tp[0]);
      }
      if(isset($_POST['mtp_id'])){
      $mtp=$_POST['mtp_id'];
      if(count($mtp)>0) $this->update_mtp($mtp[0]);
      }
    }
    else
    if(isset($_POST['add_mtp'])){
      unset($_POST['add_mtp']);
      $tp=$_POST['tp_id'];
      $this->add_mtp($tp[0]);

    } 
    else{
      $topicModel = new TopicModel();
      $topics = $topicModel->selectAll();
      $z_id=isset($_GET['z_id'])?$_GET['z_id']:0;
      $mitopicModel = new MitopicModel();
      $mitopics= $mitopicModel->selectAll();
      require_once 'views/admin/topics/index.php';
  
    }
  }

  public function add_mtp($tp_id=''){
    global $URL;
    if(isset($_POST['add_mtp'])){
      print_r($_POST);
      $mitopicModel = new MitopicModel($_POST['title'],$_POST['description'],$_POST['tp_id']);
      $mitopicModel->create();
      header("location:".$URL."admin&action=topics_index");
    }
    else{
      require_once 'views/admin/topics/add_mtp.php';
    }
  }
  
  public function add_tp($z_id=''){
    global $URL;
    if(isset($_GET['z_id'])) $z_id=$_GET['z_id'];
    if(isset($_POST['add_topic'])){
      $topicModel = new TopicModel($_POST['title'],$_POST['description']);
      $topicModel->create($_POST['z_id']);
      // $zoneModel = new ZoneModel($_POST['title'],$_POST['description']);
      // $zoneModel->create();
      // set session message gi do
      header("location:".$URL."admin&action=topics_index");
      // UserModel($username='',$fullname='',$email='',$password='',$admin='',$status)
      // tra view nao do
    }
    else
    {
      require_once 'views/admin/topics/add.php';
    }
    
  }

  public function del_mtp($mtp_id=''){
    global $URL;
    if(isset($_GET['mtp_id'])){
      $mtp_id=$_GET['mtp_id'];
    parent::del_mtp($mtp_id);
    header("location:".$URL."admin&action=topics_index");
    }
  }

  public function del_tp($tp_id=''){
    global $URL;
    if(isset($_GET['tp_id'])){
      $tp_id=$_GET['tp_id'];
 
    // nen gan get tp_id o day va truyen bien vao deltp cua cha -> ham del topic cha dung lai de dang hon
    parent::del_tp($tp_id);
    header("location:".$URL."admin&action=topics_index");
    }
  }

  public function update_tp($tp_id=''){
    global $URL;
    if(isset($_GET['tp_id'])){
      $tp_id=$_GET['tp_id'];
    }
      if(isset($_POST['update_tp'])){
        $topicModel = new TopicModel($_POST['title'],$_POST['description']);
        // print_r($_POST);
        $topicModel->update($_POST['tp_id']);
        header("location:".$URL."admin&action=topics_index");
      }
      else
        require_once 'views/admin/topics/edit_tp.php';

  }

  public function update_mtp($mtp_id=''){
    global $URL;
    if(isset($_GET['mtp_id'])){
      $mtp_id=$_GET['mtp_id'];
    }
      if(isset($_POST['update_mtp'])){
        $mitopicModel = new MitopicModel($_POST['title'],$_POST['description']);
        $mitopicModel->update($_POST['mtp_id']);
        header("location:".$URL."admin&action=topics_index");
      }
      else
        require_once 'views/admin/topics/edit_mtp.php';

  }

  // POSTSSSSSSSSSSS
  public function posts_index(){
    global $URL;
    if(isset($_POST['del_post'])){
      foreach($_POST['p_id'] as $p_id){
        $this->del_p($p_id);
      }
    }
    $postModel = new PostModel();
    $posts = $postModel->selectAll();
    $userModel = new UserModel();
    $users = $userModel->selectAll();
    require_once 'views/admin/posts/index.php';
  }

  function del_p($p_id=''){
    global $URL;
    if(isset($_GET['p_id'])) 
    {
    $p_id=$_GET['p_id'];
    }
    parent::del_p($p_id);
    header("location:".$URL."admin&action=posts_index");
    
  }

  // USERS

  public function users_index(){
    global $URL;
    if(isset($_POST['del_us'])){
      foreach($_POST['us_id'] as $us_id){
        $this->del_us($us_id);
      }
    }
    $userModel = new UserModel();
    $users = $userModel->selectAll();
    require_once 'views/admin/users/index.php';
  }

  public function del_us($u_id=''){
    global $URL;
    if(isset($_GET['u_id'])){
      $u_id=$_GET['u_id'];
    }
      $userModel = new UserModel();
      $userModel->delete($u_id);
      header("location:".$URL."admin&action=users_index");
  }

  public function add_user(){
    global $URL;
    if(isset($_POST['add_user'])){
      $role=$_POST['admin']=="Thành viên"?0:1;
      $status=isset($_POST['status'])?1:0;
      $userModel = new UserModel($_POST['username'],$_POST['fullname'],$_POST['email'],$_POST['password'],$role,$status);
      $userModel->create();
      // set session message gi do
      header("location:".$URL."admin&action=users_index");
      // UserModel($username='',$fullname='',$email='',$password='',$admin='',$status)
      // tra view nao do
    }
    else
    require_once 'views/admin/users/add.php';
  }

  public function edit_user(){
    global $URL;
    if(isset($_GET['u_id'])){
      $u_id=$_GET['u_id'];
      $userModel = new UserModel;
      $user=$userModel->getOne($u_id);
      $user_id=$user['user_id'];
      $username=$user['username'];
      $fullname=$user['fullname'];
      // xuly sau khi ma hoa ;
      $password=$user['password'];
      $email=$user['email'];
      $admin=$user['admin'];
      $status=$user['status'];
      require_once 'views/admin/users/edit.php';
    }
    if(isset($_POST['edit_user'])){
      $role=$_POST['admin']=="Thành viên"?0:1;
      $status=isset($_POST['status'])?1:0;
      $userModel2 = new UserModel($_POST['username'],$_POST['fullname'],$_POST['email'],$_POST['password'],'',$role,$status);
      $userModel2->update($_POST['user_id']);
      header("location:".$URL."admin&action=users_index");
    }

  }

  // REPORTS
  public function reports_index(){
    global $URL;
    if(isset($_POST['del_rp'])){
      foreach($_POST['rp_id'] as $rp_id){
        $this->del_rp($rp_id);
      }
    }
    $reportModel = new ReportModel();
    $reports = $reportModel->selectAll();
    $userModel = new UserModel();
    $users = $userModel->selectAll();
    require_once 'views/admin/reports/index.php';
  }

  public function del_rp($rp_id=''){
    global $URL;
    if(isset($_GET['rp_id'])){
      $rp_id=$_GET['rp_id'];
    }
    $reportModel = new ReportModel();
    $reportModel->delete($rp_id);
    header("location:".$URL."admin&action=reports_index");
  }

  // 
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

  // ABOUT-------------------------------------------------------------------------------------
  public function about(){
    global $URL;
    if(isset($_POST['ud_about'])){
      $otherModel = new OtherModel($_POST['link_ab']);
      $otherModel->update('about');
      $_SESSION['message']="Bạn đã cập nhật thành công!";
    }
    require_once 'views/admin/about.php';
  }

  public function rules(){
    global $URL;
    if(isset($_POST['ud_rule'])){
      $otherModel = new OtherModel($_POST['link_rule']);
      $otherModel->update('rule');
      $_SESSION['message']="Bạn đã cập nhật thành công!";
    }
    require_once 'views/admin/rules.php';
  }
}

?>