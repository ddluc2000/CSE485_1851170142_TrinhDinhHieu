<?php
    require_once("model.php");


    class ZoneModel{
        private $zone_id;
        private $title;
        private $description;
        public $connection;
        const TABLE="zones";
        
        function ZoneModel(){
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function selectAll($data=""){
            $sql="SELECT * FROM ". self::TABLE;
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        
    }


?>