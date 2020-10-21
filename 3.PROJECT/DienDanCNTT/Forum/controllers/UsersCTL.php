<?php
require_once 'models/UserModel.php';
class UsersCTL
{
  
// if(isset($_POST['login-btn'])){
//   $errors=validateLogin($_POST);

//   if(count($errors)===0){
//       $user= selectOne($table,['username'=>$_POST['username']]);
//   }

//   if($user && password_verify($_POST['password'],$user['password']))
//   {

//           loginUser($user);
//   }
//   else{
//       array_push($errors,'Wrong information');
//   }
//   $username=$_POST['username'];
//   $password=$_POST['password'];
  
// }
  public function index(){
    if(isset($_GET['u_id'])){
      $userModel = new UserModel();
      $user=$userModel->getOne($_GET['u_id']);
      if($user!=NULL){
        require_once 'views/userinfo.php';
      }
      else{
        echo"d co tai khoan";
      }
    }
  }

  public function login()
  {
    $username='';
    if(isset($_POST['login'])){
        unset($_POST['login']);
      // select by id and=>get name of tp_id
        //   select one
        $userModel = new UserModel();
        $user = $userModel->selectByUn($_POST['username']);
        if($user&&$user['password']===$_POST['password'])
        {       
                $_SESSION['id']=$user['user_id'];
                $_SESSION['username']=$user['username'];
                $_SESSION['fullname']=$user['fullname'];
                $_SESSION['admin']=$user['admin'];
                $_SESSION['create_at']=$user['create_at'];
                $_SESSION['message']="ban da dang nhap thanh cong!";
                // type
                header("location:".$ROOT_PATH."index.php");
                exit();
        }
        else
            {
              $username=$_POST['username'];
            }
    }
    require_once 'views/login.php';
  }

  public function logout(){
    if(isset($_SESSION['id'])){
          
          unset($_SESSION['id']);
          unset($_SESSION['username']);
          unset($_SESSION['fullname']);
          unset($_SESSION['admin']);
          unset($_SESSION['create_at']);
          // phan van giua require_once home hay dung header
          // phai sua laj goi den action index cua parentctl ko chuyen thang trang luon
          header("location:".$BASE_URL."index.php");
          exit();
    }
  }

  public function del(){
    global $URL;
    if(isset($_GET['u_id'])){
      $u_id=$_GET['u_id'];
      $userModel = new UserModel();
      $userModel->delete($u_id);
      header("location:".$URL."admin&action=users_index");

    }
  }

}

?>