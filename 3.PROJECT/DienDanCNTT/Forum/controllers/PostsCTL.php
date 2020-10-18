<?php
require_once 'models/PostModel.php';
require_once 'models/CommentModel.php';
require_once 'models/UserModel.php';
require_once 'models/MitopicModel.php';
// requuire thang user de lay thong tin
class PostsCTL
{
  public function index()
  {
    global $BASE_URL;
    if(isset($_GET['p_id'])){
        $p_id=$_GET['p_id'];
      // select by id and=>get name of tp_id
        //   select one
        $postModel = new PostModel();
        $post = $postModel->selectOne($p_id);
        $commentModel = new CommentModel();
        $comments = $commentModel->selectAll($p_id);
        $userModel = new UserModel();
        $user = $userModel->selectOne($post['user_id']);

        $us_comment=array();
        foreach($comments as $comment){
            $userModel2 = new UserModel();
            $user_cm=$userModel2->selectOne($comment['user_id']);
            array_push($us_comment,$user_cm);
        }
        
        if(isset($_POST['add_comment'])){
          unset($_POST['add_comment']);
          $commentModel2 = new CommentModel();
          $commentModel2->create($_POST);
          header("location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$_POST['post_id']);
        }
      require_once 'views/post.php';
    }
  }

  public function create(){
    // if(issetPOST)
    global $BASE_URL;
    $postModel = new PostModel();
    $mitopicModel = new MitopicModel();
    if(isset($_GET['tp_id'])&&isset($_SESSION['id'])){
      $tp_id=$_GET['tp_id'];
      if(isset($_POST['add_post'])){
        $data=[
            'title'=>$_POST['title'],
            'body'=>$_POST['body'],
            'tags'=>$_POST['tags'],
            'topic_id'=>$tp_id,
            'user_id'=>$_SESSION['id'],

        ];
        $postModel->create($data);
        header("location:".$BASE_URL."/index.php?controller=topics&action=index&tp_id=".$tp_id);
      }
      require_once 'views/addpost.php';
    }

    if(isset($_GET['mtp_id'])&&isset($_SESSION['id'])){
        $mtp_id=$_GET['mtp_id'];
        $tp_id=$mitopicModel->selectOne($mtp_id);
        if(isset($_POST['add_post'])){
          $data=[
          'title'=>$_POST['title'],
          'body'=>$_POST['body'],
          'tags'=>$_POST['tags'],
          'topic_id'=>$tp_id['topic_id'],
          'mitopic_id'=>$mtp_id,
          'user_id'=>$_SESSION['id'],

      ];
      $postModel->create($data);
      header("location:".$BASE_URL."/index.php?controller=topics&action=mtp_index&mtp_id=".$mtp_id);
    }
    require_once 'views/addpost.php';
    }
    
  }

  function edit_p(){
    global $BASE_URL;
    $postModel = new PostModel();
    $postModel2 = new PostModel();
    if(isset($_GET['p_id'])){
        $post=$postModel->selectOne($_GET['p_id']);
        if(isset($_SESSION['id'])&&$post['user_id']===$_SESSION['id']){
          $post_id=$post['post_id'];
          $title=$post['title'];
          $body=$post['body'];
          $tags=$post['tags'];
          date_default_timezone_set("Asia/Bangkok");
          $date=getdate();
          $time=$date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
          if(isset($_POST['edit_post'])){
            $data=[
              'title'=>$_POST['title'],
              'body'=>$_POST['body'],
              'tags'=>$_POST['tags'],
              'edit_at'=>$time,
          ];
            $postModel2->update($post_id,$data);
            header("location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$post_id);
          }
          require_once 'views/editpost.php';
        }
        else
        echo "Ban ko co quyen edit";
    }
  }

  function edit_c(){
    global $BASE_URL;
    $postModel2 = new PostModel();
    if(isset($_GET['p_id'])){
        $post=$postModel->selectOne($_GET['p_id']);
        if(isset($_SESSION['id'])&&$post['user_id']===$_SESSION['id']){
          $post_id=$post['post_id'];
          $title=$post['title'];
          $body=$post['body'];
          $tags=$post['tags'];
          date_default_timezone_set("Asia/Bangkok");
          $date=getdate();
          $time=$date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
          if(isset($_POST['edit_post'])){
            $data=[
              'title'=>$_POST['title'],
              'body'=>$_POST['body'],
              'tags'=>$_POST['tags'],
              'edit_at'=>$time,
          ];
            $postModel2->update($post_id,$data);
            header("location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$post_id);
          }
          require_once 'views/editpost.php';
        }
        else
        echo "Ban ko co quyen edit";
    }
  }

  function delete_p(){
    global $BASE_URL;
    $postModel = new PostModel();
    $postModel2 = new PostModel();
    if(isset($_GET['p_id'])){
      $post=$postModel->selectOne($_GET['p_id']);
      $tp_id=$post['topic_id'];
      $mtp_id=$post['mitopic_id'];
      // xac minh dang hoi thua` cho nay co the del luon!
      if(isset($_SESSION['id'])&&($post['user_id']===$_SESSION['id']||$_SESSION['admin']==1)){
        // delete ca comment nua
          $commentModel = new CommentModel();
          $commentModel->deleteAll($post['post_id']);
          $postModel2->delete($post['post_id']);
          if($mtp_id!=NULL) header("location:".$BASE_URL."/index.php?controller=topics&action=mtp_index&mtp_id=".$mtp_id);
          else header("location:".$BASE_URL."/index.php?controller=topics&action=index&tp_id=".$tp_id);
      }
      else
        echo "Ban d du tham quyen";
    }
  }

  function delete_c(){
    global $BASE_URL;
    if(isset($_GET['cm_id'])){
    $commentModel = new CommentModel();
      $cm=$commentModel->selectOne($_GET['cm_id']);
      $p_id=$cm['post_id'];
      if(isset($_SESSION['id'])&&$cm['user_id']===$_SESSION['id']){
        // delete ca comment nua
        $commentModel2 = new CommentModel();
        $commentModel2->deleteOne($_GET['cm_id']);
        header("location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$p_id);
      }
      else
        echo "Ban d du tham quyen";
    }
  }

}

?>