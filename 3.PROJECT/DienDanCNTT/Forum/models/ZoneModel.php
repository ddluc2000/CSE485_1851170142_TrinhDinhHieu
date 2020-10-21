<?php
    require_once("model.php");


    class ZoneModel{
        private $zone_id;
        private $title;
        private $description;
        public $connection;
        const TABLE="zones";
        
        function ZoneModel($title='',$description=''){
            $this->title=$title;
            $this->description=$description;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function create(){
            $sql="INSERT INTO ". self::TABLE . " SET title='$this->title' ,description='$this->description'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function selectAll($data=""){
            $sql="SELECT * FROM ". self::TABLE;
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        function getOne($z_id){
            $sql="SELECT * FROM ". self::TABLE ." WHERE topic_id='$z_id' LIMIT 1";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
        }

        function delete($z_id){
            $sql="DELETE FROM ". self::TABLE . " WHERE zone_id='$z_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function update($z_id){
            $sql="UPDATE ". self::TABLE . " SET title='$this->title' ,description='$this->description'";
            $sql=$sql." WHERE zone_id=".$z_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
    }


?>