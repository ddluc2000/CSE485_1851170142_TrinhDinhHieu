<?php

    require('connect.php');


    function dd($value){
        echo "<pre>", print_r($value,true), "</pre>";
        die();
    }
    // SELECT
    function selectAll($table,$conditions=[])
    {
        global $conn;
        $sql="SELECT * FROM $table";
        if(empty($conditions)){
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
        else{
            // $sql="SELECT * FROM $table WHERE username='Hieu' AND admin=1"
        $i=0;
        foreach($conditions as $key => $value){
            if($i===0){
                $sql=$sql." WHERE $key=?";
            }
            else{
                $sql=$sql." AND $key=?";
            }
            $i++;
         }
         $stmt =$conn->prepare($sql);
         $val
         $stmt->bind_param($conditions,'is');
         $stmt->execute();
         $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
         return $records;
        }
    }

    $conditions=[
        'admin' => 1,
        'username' => 'Hieu'
    ];

    $users=selectAll('users',$conditions);
    dd($users);



?>