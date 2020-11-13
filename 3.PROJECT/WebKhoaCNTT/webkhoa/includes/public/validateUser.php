<?php
    function validateUser($user){

        $errors = array();

        if(empty($user['username'])){
            array_push($errors,'Tên đăng nhập là bắt buộc');
        }
        if(empty($user['email'])){
            array_push($errors,'Email là bắt buộc');
        }
        if(empty($user['password'])){
            array_push($errors,'Mật khẩu là bắt buộc');
        }
        if($user['passwordCom']!== $user['password']){
            array_push($errors,'Mật khẩu không giống nhau');
        }
        // $existingEmail= selectOne('users', ['email'=> $user['email']]);
        // if($existingEmail){
        //     array_push($errors,'email đã lập rồi');
        // }

        $existingUser= selectOne('users', ['email'=> $user['email']]);
        if($existingUser){
            if(isset($user['update-admin']) && $existingUser['id'] != $user['id']){
                array_push($errors,'Email đã tồn tại');
            }
            if(isset($post['add-post'])){
                array_push($errors,'Email đã tồn tại');
            }
        }
        return $errors;
    }

    function validateLogin($user){

        $errors = array();

        if(empty($user['username'])){
            array_push($errors,'Tên đăng nhập là bắt buộc');
        }
        if(empty($user['password'])){
            array_push($errors,'Mật khẩu là bắt buộc');
        }
        return $errors;
    }
?>