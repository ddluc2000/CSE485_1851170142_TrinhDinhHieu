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
                $_SESSION['username']=$user['username'];
                $_SESSION['id']=$user['user_id'];
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
          unset($_SESSION['message']);
          // phan van giua require_once home hay dung header
          header("location:".$ROOT_PATH."index.php");
          exit();
    }
  }

}

?>