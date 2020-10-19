<?php
    require_once("model.php");


    class CommentModel{
        private $cm_id;
        private $body;
        private $create_at;
        private $edit_at;
        private $post_id;
        private $user_id;
        public $connection;
        const TABLE="comments";
        
        function CommentModel($body="",$post_id="",$user_id="",$edit_at=""){
            $this->body=$body;
            $this->post_id=$post_id;
            $this->user_id=$user_id;
            $this->edit_at=$edit_at;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function create(){
            $sql="INSERT INTO ". self::TABLE ." SET body='$this->body', post_id='$this->post_id', user_id='$this->user_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        
        function update($cm_id){
            $sql="UPDATE ". self::TABLE . " SET body='$this->body', edit_at='$this->edit_at'";
            $sql=$sql." WHERE cm_id=".$cm_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        // CHUA CHUAN HOA LAJ
        function selectAll($p_id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE post_id='$p_id'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }
        
        function getOne($id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE cm_id='$id' LIMIT 1";

            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
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