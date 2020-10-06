<?php

    function validateTopic($topic){
        $errors=array();
        if(empty($topic['name'])){
            array_push($errors,'Name is required 2');
        }

        $existingTopic= selectOne('topics',[ 'name' => $topic['name']]);
        if(isset($existingTopic)){
            array_push($errors,'Topic already exists');
        }
        return $errors;
    }



?>