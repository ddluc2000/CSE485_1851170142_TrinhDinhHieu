<?php

    function validateTopic($topic){
        $errors=array();
        if(empty($topic['name'])){
            array_push($errors,'Name is required 2');
        }

        $existingTopic= selectOne('topics',[ 'name' => $topic['name']]);
        if(isset($existingTopic)){
            if(isset($topic['update-topic'])&&($topic['id']!=$existingTopic['id']))
            {
            array_push($errors,'Topic already exists');
            }
            if(isset($topic['add-topic'])){
                array_push($errors,'Topic already exists');
            }
        }
        return $errors;
    }



?>