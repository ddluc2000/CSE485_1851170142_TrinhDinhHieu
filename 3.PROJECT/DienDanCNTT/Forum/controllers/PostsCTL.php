<?php
require_once 'models/PostModel.php';
require_once 'models/CommentModel.php';
require_once 'models/UserModel.php';
require_once 'models/MitopicModel.php';
require_once 'controllers/ParentCTL.php';
// requuire thang user de lay thong tin
class PostsCTL extends ParentCTL
{
  public function index()
  {
    global $BASE_URL;
    if(isset($_GET['p_id'])){
        $p_id=$_GET['p_id'];
      // select by id and=>get name of tp_id
        //   select one
        $postModel = new PostModel();
        $post = $postModel->getOne($p_id);
        $commentModel = new CommentModel();
        $comments = $commentModel->selectAll($p_id);
        $userModel = new UserModel();
        $user = $userModel->getOne($post['user_id']);
        $us_comment=array();
        // lay thong tin nguoi dang comment
        foreach($comments as $comment){
          
            $userModel2 = new UserModel();
            $user_cm=$userModel2->getOne($comment['user_id']);
            array_push($us_comment,$user_cm);
        }
        
        // XU ly lai
        
      require_once 'views/post.php';
    }
  }

  function addComment(){
    global $BASE_URL;
      if(isset($_GET['p_id'])){
        $p_id=$_GET['p_id'];
        if(isset($_POST['add_comment'])){
          unset($_POST['add_comment']);
          // ($body,$post_id,$user_id,$edit_at="")
          $commentModel2 = new CommentModel($_POST['body'],$_POST['post_id'],$_POST['user_id']);
          $commentModel2->create();
          // echo "location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$p_id;
          header("location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$p_id);
        }
      }
  }
  function create(){
    // if(issetPOST)
    global $BASE_URL;

    // function PostModel($title="",$body="",$tags="",$user_id="",$topic_id="",$mitopic_id="")
    if(isset($_GET['tp_id'])&&isset($_SESSION['id'])){
      $tp_id=$_GET['tp_id'];   
      if(isset($_POST['add_post'])){
        $postModel = new PostModel($_POST['title'],$_POST['body'],$_POST['tags'],$_SESSION['id'],$tp_id);
        $postModel->create();
        header("location:".$BASE_URL."/index.php?controller=topics&action=index&tp_id=".$tp_id);
      }
      require_once 'views/addpost.php';
    }

    if(isset($_GET['mtp_id'])&&isset($_SESSION['id'])){
        $mtp_id=$_GET['mtp_id'];
        $mitopicModel = new MitopicModel();

        $mtp=$mitopicModel->getOne($mtp_id);
        if(isset($_POST['add_post'])){
            $postModel = new PostModel($_POST['title'],$_POST['body'],$_POST['tags'],$_SESSION['id'],$mtp['topic_id'],$mtp_id);
            $postModel->create();
            header("location:".$BASE_URL."/index.php?controller=topics&action=mtp_index&mtp_id=".$mtp_id);
        }
        require_once 'views/addpost.php';
    }
    
  }

  function edit_p(){
    global $BASE_URL;
    $postModel = new PostModel();
    
    if(isset($_GET['p_id'])){
        $post=$postModel->getOne($_GET['p_id']);
        if(isset($_SESSION['id'])&&$post['user_id']===$_SESSION['id']){
          // gan gia tri cua post muon sua vao khung nhap
          $post_id=$post['post_id'];
          $title=$post['title'];
          $body=$post['body'];
          $tags=$post['tags'];

          // lay time
          date_default_timezone_set("Asia/Bangkok");
          $date=getdate();
          $time=$date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
          // sua
          if(isset($_POST['edit_post'])){
          // ($title="",$body="",$tags="",$user_id="",$topic_id="",$mitopic_id="",$edit_at="")
            $postModel2 = new PostModel($_POST['title'],$_POST['body'],$_POST['tags'],'','','',$time);
            $postModel2->update($post_id);
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
    
    if(isset($_GET['cm_id'])){

      print_r($_POST);
      // ($body="",$post_id="",$user_id="",$edit_at="")
        $commentModel = new CommentModel($_POST['body']);
        $commentModel->update($_GET['cm_id']);
        header("location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$_POST['post_id']);
        // if(isset($_SESSION['id'])&&$comment['user_id']===$_SESSION['id']){
        //   // $body=$comment['body'];
        //   date_default_timezone_set("Asia/Bangkok");
        //   $date=getdate();
        //   // sua lai cu phap ngan hon lay time
        //   $time=$date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
        //   if(isset($_POST['edit_cm'])){
        //     // ($body="",$post_id="",$user_id="",$edit_at="")
        //     $commentModel2 = new CommentModel($_POST['body'],'','',$time);
        //     print_r($_POST);
        //     echo $comment['cm_id'];
        //     $commentModel2->update($comment['cm_id']);
        //     // header("location:".$BASE_URL."/index.php?controller=posts&action=index&p_id=".$comment['post_id']);
        //   }
        //   // require_once 'views/editpost.php';
        // }
        // else
        // echo "Ban ko co quyen edit";
    }
  }

  function delete_p(){
    global $BASE_URL;
    $postModel = new PostModel();
    // if(isset($_GET['p_id'])){

      // xac minh dang hoi thua` cho nay co the del luon!
      // if(isset($_SESSION['id'])&&($post['user_id']===$_SESSION['id']||$_SESSION['admin']==1)){
      //   // delete ca comment nua
      //     $commentModel = new CommentModel();
      //     $commentModel->deleteAll($post['post_id']);
      //     $postModel2->delete($post['post_id']);
      parent::del_p();
      $post=$postModel->getOne($_GET['p_id']);
      $tp_id=$post['topic_id'];
      $mtp_id=$post['mitopic_id'];
      if($mtp_id!=NULL) header("location:".$BASE_URL."/index.php?controller=topics&action=mtp_index&mtp_id=".$mtp_id);
      else header("location:".$BASE_URL."/index.php?controller=topics&action=index&tp_id=".$tp_id);
    //   }
    //   else
    //     echo "Ban d du tham quyen";
    // }
  }

  function delete_c(){
    global $BASE_URL;
    if(isset($_GET['cm_id'])){
    $commentModel = new CommentModel();
      $cm=$commentModel->getOne($_GET['cm_id']);
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