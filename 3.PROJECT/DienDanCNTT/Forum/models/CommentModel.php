<?php
    require_once("model.php");


    class CommentModel{
        private $cm_id;
        private $body;
        private $post_id;
        private $user_id;
        public $connection;
        const TABLE="comments";
        
        function CommentModel(){
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function selectAll($p_id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE post_id='$p_id'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }
        
        function selectOne($id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE cm_id='$id' LIMIT 1";

            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }
        
        function create($data=[]){
                $sql="INSERT INTO ". self::TABLE;
                $i=0;
                foreach($data as $key=>$value){
                    if($i==0){
                        $sql=$sql." SET $key='$value'";
                    }
                    else{
                        $sql=$sql." ,$key='$value'";
                    }
                    $i++;
                }
                $rs=mysqli_query($this->connection,$sql);
                closeConnect($this->connection);
                return 1;
        }

        function deleteAll($p_id){
            $sql="DELETE FROM comments WHERE post_id=".$p_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function deleteOne($cm_id){
            $sql="DELETE FROM comments WHERE cm_id=".$cm_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
    }



?>