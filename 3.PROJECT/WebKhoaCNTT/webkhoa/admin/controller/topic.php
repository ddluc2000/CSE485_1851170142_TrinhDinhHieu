<?php 
    include(ROOT_PATH ."/includes/functions_admin.php");
    include(ROOT_PATH ."/includes/public/middleware.php");
    include(ROOT_PATH ."/includes/public/validateTopic.php");
    
    $table='topic';
    $errors=array();
    $id='';
    $name='';
    
    $topics= selectAll($table);


    if(isset($_POST['add-topic'])){
        adminsOnly();
        $errors= validateTopic($_POST);
        if(count($errors) == 0){
            unset($_POST['add-topic']);
            $topic_id=create($table,$_POST);
            $_SESSION['message']='Topic được tạo thành công';
            header("location: ". BASE_URL ."/admin/index_topic.php");
            exit();
        }else {
            $name=$_POST['name'];
            $idpost=$_POST['idpost'];
        }
        
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $topic= selectOne($table, ['id'=>$id]);
        $id=$topic['id'];
        $name=$topic['name'];
    }

    if(isset($_POST['update-topic'])){
        adminsOnly();
        $errors= validateTopic($_POST);
        if(count($errors) == 0){
            $id =$_POST['id'];
            unset($_POST['update-topic'],$_POST['id']);
            $topic_id= update($table,$id,$_POST);
            $_SESSION['message']='Topic được sửa thành công';
            header("location: ". BASE_URL ."/admin/index_topic.php");
            exit();
        }else{
            $id =$_POST['id'];
            $name=$_POST['name'];
        }
        
    }

    if(isset($_GET['del_id'])){
        adminsOnly();
        $id=$_GET['del_id'];
        $count = delete($table,$id);
        $_SESSION['message']='Topic được xóa thành công';
        header("location: ". BASE_URL ."/admin/index_topic.php");
        exit();

    }
?>