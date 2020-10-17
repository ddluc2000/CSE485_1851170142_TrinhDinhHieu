<?php
    require_once("model.php");


    class PostModel{
        private $post_id;
        private $title;
        private $body;
        private $tags;
        private $topic_id;
        private $mitopic_id;
        
        public $connection;
        const TABLE="posts";
        
        function PostModel(){
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
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

        
    }

    // $tp=new PostModel();
    // $rs=$tp->selectAll();
    // print_r($rs);


?>