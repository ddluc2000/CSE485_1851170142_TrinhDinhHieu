<?php
    require_once("path.php");
    require_once($ROOT_PATH."/config/connect.php");

    function openConnect(){
        $conn=mysqli_connect(HOST,USER,PASS,DB);
        if(!$conn)
        {
            die("khong ket loi duoc den db!");
        }

        return $conn;
    }

    function closeConnect($connection){
        mysqli_close($connection);
    }

?>