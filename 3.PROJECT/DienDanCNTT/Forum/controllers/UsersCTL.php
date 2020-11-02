<?php
require_once 'models/UserModel.php';
require_once 'supports/validateUser.php';
class UsersCTL
{
  
  public function index(){
    global $ROOT_PATH;
    global $URL;
    if(isset($_GET['u_id'])){
      $userModel = new UserModel();
      $user=$userModel->getOne($_GET['u_id']);
      if($user!=NULL){
        if(isset($_POST['update'])){
          // sau chinh lai verify
        
          if($_POST['password']==$user['password']){
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

            $userModel2 = new UserModel($user['username'],$_POST['fullname'],$_POST['email'],$user['password'],$image_name);
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
              if($user&&$user['password']===$_POST['password'])
              {       
                      $_SESSION['id']=$user['user_id'];
                      $_SESSION['username']=$user['username'];
                      $_SESSION['fullname']=$user['fullname'];
                      $_SESSION['avt']=$user['avt'];
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