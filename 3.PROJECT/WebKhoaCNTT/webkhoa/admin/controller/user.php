<?php 
    include(ROOT_PATH . "/includes/functions_admin.php");
    include(ROOT_PATH ."/includes/public/middleware.php");
    include(ROOT_PATH . "/includes/public/validateUser.php");
   
    $errors=array();
    $table='users';
    $admin=selectAll($table,  );
    $admins='';
    $id='';
    $username='';
    $email='';
    $password='';
    $passwordCom='';
   



    function userLogin($user){ 
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['admin']=$user['admin'];
            $_SESSION['message'] = 'Bạn đã đăng nhập';
            
            if($_SESSION['admin']){
                header('location: '.BASE_URL . '/admin/dashboard.php');
            }
            else{
                header('location: '.BASE_URL . '/index.php');
            }      
            exit();
    }

    if(isset($_POST['register-btn']) || isset($_POST['add-admin'])){
        $errors = validateUser($_POST);
        if(count($errors) === 0){
            unset($_POST['register-btn'],$_POST['passwordCom'],$_POST['add-admin']);
            $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);            
            if(isset($_POST['admin'])){
                $_POST['admin']=1;
                $user_id=create($table,$_POST);
                $_SESSION['message'] = 'Admin đã đăng nhập';
                header('location: '.BASE_URL . '/admin/index_admin.php');
                exit();
            }else{
                $_POST['admin']=0;
                $user_id=create($table,$_POST);
                $user=selectOne($table,['id' => $user_id]);
                userLogin($user);
            } 

        }else {
            $username=$_POST['username'];
            $admins=isset($_POST['admin']) ? 1: 0;
            $email=$_POST['email'];
            $password=$_POST['password'];
            $passwordCom=$_POST['passwordCom'];
        }
    }

    if(isset($_POST['update-admin'])){
        adminsOnly();
        $errors= validateUser($_POST);
        if(count($errors) == 0){
            unset($_POST['passwordCom'],$_POST['update-admin']);
            $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT); 
            $_POST['admin']=isset($_POST['admin']) ? 1: 0;
            $user_id= update($table,$_POST['id'],$_POST);
            $_SESSION['message']='Topic được sửa thành công';
            header("location: ". BASE_URL ."/admin/index_admin.php");
            exit();
        }else{
            $username=$_POST['username'];
            $admins=isset($_POST['admin']) ? 1: 0;
            $email=$_POST['email'];
            $password=$_POST['password'];
            $passwordCom=$_POST['passwordCom'];
        }
        
    }

    if(isset($_GET['id'])){
        $userr =selectOne($table, ['id' => $_GET['id']]);
        $username=$userr['username'];
        $admins=$userr['admin'] == 1 ? 1 : 0;
        $email=$userr['email'];
    }
    

    if(isset($_POST['login-btn'])){
        $errors = validateLogin($_POST);
        if(count($errors) == 0){
            $user= selectOne($table,['username' => $_POST['username']]);
            if($user && password_verify($_POST['password'] , $user['password'])){
                userLogin($user);
            }
            else{
                array_push($errors, 'Đăng nhập lỗi');
              
            }
        }
        $username=$_POST['username'];
        $password=$_POST['password']; 
    }

    if(isset($_GET['del_id'])){
        adminsOnly();
        $ids=$_GET['del_id'];
        $count = delete($table,$ids);
        $_SESSION['message']='xóa thành công';
        header("location: ". BASE_URL ."/admin/index_admin.php");
        exit();

    }

   
?>