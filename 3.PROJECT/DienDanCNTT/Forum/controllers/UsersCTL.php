<?php
require_once 'models/UserModel.php';
require_once 'models/PostModel.php';
require_once 'supports/validateUser.php';
class UsersCTL
{
  
  public function index(){
    global $ROOT_PATH;
    global $URL;
    if(isset($_GET['u_id'])){
      $userModel = new UserModel();
      $user=$userModel->getOne($_GET['u_id']);
      $postModel = new PostModel();
      $posts=$postModel->selectAll(['user_id'=>$_GET['u_id']]);
      if($user!=NULL){
        if(isset($_POST['update'])){
          // sau chinh lai verify
        
          if(password_verify($_POST['password'],$user['password'])){
          //   // ($username='',$fullname='',$email='',$password='',$avt='',$admin='',$status='')
            $image_name=$_SESSION['avt'];
            if(!empty($_FILES['avatar']['tmp_name'])){
              $file = $_FILES['avatar']['tmp_name'];
          //     // $path = "file/".$_FILES['myFile']['name'];
              $image_name=time().'_'.$user['user_id'].'.jpg';
          //     $file = $_FILES['avatar']['tmp_name'];
              $path = "assets/images/avt/".$image_name;
              move_uploaded_file($file, $path);
              $_SESSION['avt']=$image_name;
            }
            $signature="";
            $signature=$_POST['signature'];
            $userModel2 = new UserModel($user['username'],$_POST['fullname'],$_POST['email'],$user['password'],$image_name,$signature);
            $userModel2->update($user['user_id']);
            $_SESSION['fullname']=$_POST['fullname'];
            
            $_SESSION['message']="Bạn đã cập nhật thông tin thành công!";
            header("refresh:2");
          }
        }
        require_once 'views/users/userinfo.php';
      }
      else{
        echo"d co tai khoan";
      }
    }
  }

  // public function update($u_id=''){
  //   global $URL;
  //   if(isset($_POST['update'])){
  //     print_r($_FILES);
  //   }
  //   else
  //   require_once 'views/users/edit_user.php';
  // }

  public function login()
  {
    global $BASE_URL;
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

          if($user!==NULL && $user['status']==0) array_push($errors,'Tài khoản của bạn chưa được kích hoạt hoặc đã bị khóa');
          else
          {
              if($user&&password_verify($_POST['password'],$user['password']))
              {       
                      $_SESSION['id']=$user['user_id'];
                      $_SESSION['username']=$user['username'];
                      $_SESSION['fullname']=$user['fullname'];
                      $_SESSION['avt']=$user['avt'];
                      $_SESSION['admin']=$user['admin'];
                      $_SESSION['create_at']=$user['create_at'];
                      $_SESSION['message']="Bạn đã đăng nhập thành công!";
                      // type
                      header("location:".$BASE_URL."/index.php");
                      exit();
              }
              else
                  {
                    $username=$_POST['username'];
                    array_push($errors,'Bạn đã nhập sai tài khoản hoặc mật khẩu');
                  }
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
            $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
            $userModel = new UserModel($_POST['username'],$_POST['fullname'],$_POST['email'],$pass);
            $userModel->create();
            $_SESSION['message']="Đăng ký tài khoản thành công!";
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
    global $BASE_URL;
    if(isset($_SESSION['id'])){
          
          unset($_SESSION['id']);
          unset($_SESSION['username']);
          unset($_SESSION['fullname']);
          unset($_SESSION['admin']);
          unset($_SESSION['create_at']);
          $_SESSION['message']="Bạn đã đăng xuất thành công!";
          // phan van giua require_once home hay dung header
          // phai sua laj goi den action index cua parentctl ko chuyen thang trang luon
          header("location:".$BASE_URL."/index.php");
          exit();
    }
  }

  public function del(){
    global $URL;
    if(isset($_GET['u_id'])){
      $u_id=$_GET['u_id'];
      $userModel = new UserModel();
      $userModel->delete($u_id);
      $_SESSION['message']="Xóa tài khoản thành công!";
      header("location:".$URL."admin&action=users_index");

    }
  }

}

?>