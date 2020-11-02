<?php
    require_once("model.php");


    class OtherModel{
        private $id;
        private $name;
        private $link;
        public $connection;
        const TABLE="others";
        
        function OtherModel($link=''){
            $this->link=$link;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }
        
        function update($name){
            $_link = mysqli_real_escape_string($this->connection,$this->link);
            $sql="UPDATE ". self::TABLE . " SET link='".$_link."'";
            $sql=$sql." WHERE name='".$name."'";
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function getLink($name){
            $sql="SELECT link FROM ". self::TABLE . " WHERE name='".$name."'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
        }
    }



?>