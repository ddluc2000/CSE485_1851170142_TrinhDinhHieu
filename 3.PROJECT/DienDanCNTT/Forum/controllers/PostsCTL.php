<?php
require_once 'models/PostModel.php';
require_once 'models/CommentModel.php';
require_once 'models/UserModel.php';
require_once 'models/CommentModel.php';
// requuire thang user de lay thong tin
class PostsCTL
{
  public function index()
  {
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
      require_once 'views/post.php';
    }
  }

}

?>