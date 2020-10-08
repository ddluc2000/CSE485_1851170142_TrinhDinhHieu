<?php

    function validatePost($post){
        $errors=array();
        if(empty($post['title'])){
            array_push($errors,'Title is required');
        }
        if(empty($post['body'])){
            array_push($errors,'Body is required');
        }
        if(empty($post['topic_id'])){
            array_push($errors,'topic is required');
        }
        $existingPost= selectOne('posts' , ['title' => $post['title']]);
        
        if(isset($existingPost)){
            if(isset($post['update-post'])&&($post['id'] != $existingPost['id'])){
                array_push($errors,'Post with that title already exists 1');
            }
            if(isset($post['add-post']))
            array_push($errors,'Post with that title already exists');
        }

        return $errors;
    }
    ?>
