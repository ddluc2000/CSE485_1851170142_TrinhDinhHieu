<?php 

    function adminsOnly($redirerct = '/index.php'){
        if(empty($_SESSION['id']) || empty($_SESSION['admin'])){
            $_SESSION['message']='Bạn không được quyền';
            $_SESSION['type']='error';
            header('location: '.BASE_URL . $redirect);
            exit(0);       }
    }

?>