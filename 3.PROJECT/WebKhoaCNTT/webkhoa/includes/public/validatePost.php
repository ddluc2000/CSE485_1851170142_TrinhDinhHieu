<?php
    function validatePost($post){

        $errors = array();
        if(empty($post['title'])){
            array_push($errors,'Tiêu đề là bắt buộc');
        }
        if(empty($post['content'])){
            array_push($errors,'Nội dung là bắt buộc');
        }
        if(empty($post['topic_id'])){
            array_push($errors,'Chọn chủ đề phù hợp');
        }
        
        $existingPost= selectOne('post', ['title'=> $post['title']]);
        if($existingPost){
            if(isset($post['update-post']) && $existingPost['id'] != $post['id']){
                array_push($errors,'Tiêu đề đã tồn tại');
            }
            if(isset($post['add-post'])){
                array_push($errors,'Tiêu đề đã tồn tại');
            }
        }
        return $errors;
    }

?>