<?php
require_once 'models/UserModel.php';
require_once 'supports/validateUser.php';
class UsersCTL
{
  
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
    $errors=array();
    if(isset($_POST['login'])){
        unset($_POST['login']);
      // select by id and=>get name of tp_id
        //   select one
        $errors=validateLogin($_POST);
        if(count($errors)==0){
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
                $_SESSION['message']="ban da nhap sai thong tin!";
              }
        }
    }
    require_once 'views/login.php';
  }

  public function register(){
    global $URL;
    // if(isset($_POST['register']))
    // print_r($_POST);
    $errors=array();
        if(isset($_POST['register'])){
          unset($_POST['register']);
          $errors=validateUser($_POST);
            if(count($errors)==0){
            $userModel = new UserModel($_POST['username'],$_POST['fullname'],$_POST['email'],$_POST['password']);
            $userModel->create();
            $_SESSION['message']="Register successfully";
            header("location:".$URL."parent&action=index");
            exit();
            }
          // set session message gi do
          
          // UserModel($username='',$fullname='',$email='',$password='',$admin='',$status)
          // tra view nao do
          
    }
    require_once 'views/register.php';
    
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