<?php

function validateUser($user){
    $errors=array();
    if(empty($user['username'])){
        array_push($errors,'Username is required');
    }
    if(empty($user['fullname'])){
        array_push($errors,'Fullname is required');
    }
    if(empty($user['email'])){
        array_push($errors,'Email is required');
    }
    if(empty($user['password'])){
        array_push($errors,'Password is required');
    }
    if($user['conf_pass'] != $user['password']){
        array_push($errors,'Password do not match');
    }
    $userModel = new UserModel();
    $existingUser = $userModel->selectAll(['username'=>$user['username']]);
    if($existingUser!=NULL)
    array_push($errors,'Username already exists');
    $userModel2 = new UserModel();
    $existingEmail = $userModel2->selectAll(['email'=>$user['email']]);
    if($existingEmail!=NULL)
    array_push($errors,'Email already exists');
    return $errors;
}


function validateLogin($user){
    $errors=array();
    if(empty($user['username'])){
        array_push($errors,'Username is required');
    }
    
    if(empty($user['password'])){
        array_push($errors,'Password is required');
    }
   
    
    return $errors;
}
?>