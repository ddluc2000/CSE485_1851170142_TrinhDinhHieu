<?php
    function validateTopic($topic){

        $errors = array();

        if(empty($topic['name'])){
            array_push($errors,'Tên là bắt buộc');
        }
        
        $existingTopic= selectOne('topic', ['name'=> $topic['name']]);
        if($existingTopic){
            if(isset($post['update-topic']) && $existingTopic['id'] != $topic['id']){
                array_push($errors,'Tên đã tồn tại');
            }
            if(isset($post['add-post'])){
                array_push($errors,'Tên đề đã tồn tại');
            }
        }
        return $errors;
    }

?>