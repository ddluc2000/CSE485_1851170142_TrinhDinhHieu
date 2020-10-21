<?php
    require_once("model.php");


    class TopicModel{
        private $topic_id;
        private $title;
        private $description;
        public $connection;
        const TABLE="topics";
        
        function TopicModel($title='',$description=''){
            $this->title=$title;
            $this->description=$description;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function create($z_id){
            $sql="INSERT INTO ". self::TABLE . " SET title='$this->title' ,description='$this->description', zone_id='$z_id'";
            $rs=mysqli_query($this->connection,$sql);
            return 1;
        }

        function selectAll($data=[]){
            $sql="SELECT * FROM ". self::TABLE;
            $i=0;
            foreach($data as $key=>$value){
                if($i==0){
                    $sql=$sql." WHERE $key=$value";
                }
                else{
                    $sql=$sql." AND $key=$value";
                }
                $i++;
            }
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        function getTpInZn($z_id){
            $sql="SELECT * FROM ". self::TABLE ." WHERE zone_id='$z_id'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
        }

        function getNamebyId($tp_id){
            $sql="SELECT title FROM ". self::TABLE ." WHERE topic_id='$tp_id'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
        }

        function getOne($tp_id){
            $sql="SELECT * FROM ". self::TABLE ." WHERE topic_id='$tp_id' LIMIT 1";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
        }

        function delete($tp_id){
            $sql="DELETE FROM ". self::TABLE . " WHERE topic_id='$tp_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
    }

    // $tp=new TopicModel();
    // $rs=$tp->selectAll(['zone_id'=>1]);
    // print_r($rs);


?>