<?php 
    include(ROOT_PATH ."/includes/functions_admin.php");
    include(ROOT_PATH ."/includes/public/middleware.php");
    include(ROOT_PATH ."/includes/public/validatePost.php");

    $table='post';
    $topics=selectAll('topic');
    $posts=selectAll($table);

   
    $errors=array();
    $id="";
    $title="";
    $content="";
    $topic_id="";
    $published="";

    if(isset($_GET['id'])){
        $post= selectOne($table, ['id'=>$_GET['id']]);
        $id=$post['id'];
        $title=$post['title'];
        $content=$post['content'];
        $topic_id=$post['topic_id'];
        $published=$post['published'];
    }

    if(isset($_GET['del_id'])){
        adminsOnly();
        $count=delete($table,$_GET['del_id']);
        $_SESSION['message']="xóa post thành công";
            header("location: ". BASE_URL ."/admin/index_post.php");
            exit();
    }

    if(isset($_GET['published']) && isset ($_GET['p_id'])){
        adminsOnly();
        $published = $_GET['published'];
        $p_id = $_GET['p_id'];
        $count= update($table,$p_id, ['published'=> $published]);
        $_SESSION['message']='Post published state changed';
        header("location: ". BASE_URL ."/admin/index_post.php");
            exit();
    }

    if(isset($_POST['add-post'])){
        adminsOnly();
         $errors=validatePost($_POST);
               if(!empty($_FILES['image']['name'])){
            $image_name =time() .'_'. $_FILES ['image']['name'];
            $destination= ROOT_PATH . "/images/".$image_name;
            $result= move_uploaded_file($_FILES['image']['tmp_name'],$destination);
            if($result){    
                $_POST['image']=$image_name;
            }else{
                array_push($errors,"false");
            }
        }else{
            array_push($errors,"ok");
        }
        if(count($errors)==0){
            unset($_POST['add-post']);
            $_POST['user_id']=$_SESSION['id'];
            $_POST['published']= isset($_POST['published']) ? 1 : 0;
            $_POST['content']=htmlentities($_POST['content']);
            $post_id=create($table,$_POST);
            $_SESSION['message']="Tạo post thành công";
            header("location: ". BASE_URL ."/admin/index_post.php");
            exit();
    
        }else{
            $title=$_POST['title'];
            $content=$_POST['content'];
            $topic_id=$_POST['topic_id'];
            $published=isset($_POST['published']) ? 1 : 0;
        }

       
    }

    if(isset($_POST['update-post'])){
        adminsOnly();
        $errors= validatePost($_POST);
        if(count($errors) == 0){
            $id=$_POST['id'];
            unset($_POST['update-post'],$_POST['id']);
            $_POST['user_id']=$_SESSION['id'];
            $_POST['published']= isset($_POST['published']) ? 1 : 0;
            $_POST['content']=htmlentities($_POST['content']);
            $post_id=update($table,$id,$_POST);
            $_SESSION['message']="Cập nhật post thành công";
            header("location: ". BASE_URL ."/admin/index_post.php");
            exit();
        }else{
            $title=$_POST['title'];
            $content=$_POST['content'];
            $topic_id=$_POST['topic_id'];
            $published=isset($_POST['published']) ? 1 : 0;
        }
    }

   
?>