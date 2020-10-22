<?php

    function validatePost($post){
        $errors=array();
        if(empty($post['title'])){
            array_push($errors,'Title is required');
        }
        if(empty($post['body'])){
            array_push($errors,'Body is required');
        }

        return $errors;
    }

    function validateCm($comment){
        $errors=array();
        if(empty($comment['body'])){
            array_push($errors,'Body is required');
        }

        return $errors;
    }
    ?>
