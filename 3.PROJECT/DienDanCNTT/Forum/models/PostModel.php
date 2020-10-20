<?php
    require_once("model.php");


    class PostModel{
        private $post_id;
        private $title;
        private $create_at;
        private $edit_at;
        private $body;
        private $tags;
        private $status;
        private $user_id;
        private $topic_id;
        private $mitopic_id; 
        public $connection;
        const TABLE="posts";


        function PostModel($title="",$body="",$tags="",$user_id="",$topic_id="",$mitopic_id="",$edit_at=""){
            $this->title=$title;
            // $this->create_at=$create_at;
            $this->body=$body;
            $this->tags=$tags;
            $this->user_id=$user_id;
            $this->topic_id=$topic_id;
            $this->mitopic_id=$mitopic_id;
            $this->edit_at=$edit_at;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function create(){
            $sql="INSERT INTO ". self::TABLE . " SET title='$this->title' ,body='$this->body', tags='$this->tags', user_id='$this->user_id', topic_id='$this->topic_id'";
            if($this->mitopic_id!="") $sql=$sql." , mitopic_id='$this->mitopic_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        // CHUA CHUAN HOA LAI

        // function getPostAuthor($p_id){
        //     $sql="SELECT p.*,u.username,u.user_id FROM posts As p JOIN users as u ON p.user_id=u.user_id WHERE p.post_id='$p_id' ORDER BY p.post_id DESC";
        //     $rs=mysqli_query($this->connection,$sql);
        //     $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
        //     closeConnect($this->connection);
        //     return $result;
        // }
        function getPostInTP($tp_id){
            $sql="SELECT p.*,u.username,u.user_id FROM posts As p JOIN users as u ON p.user_id=u.user_id WHERE p.topic_id='$tp_id' ORDER BY p.post_id DESC";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
        }

        function getPostInMTP($mtp_id){
            $sql="SELECT p.*,u.username,u.user_id FROM posts As p JOIN users as u ON p.user_id=u.user_id WHERE p.mitopic_id='$mtp_id' ORDER BY p.post_id DESC";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
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
        
        function getOne($id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE post_id='$id' LIMIT 1";

            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        

        function update($p_id){
            $sql="UPDATE ". self::TABLE . " SET title='$this->title' ,body='$this->body', tags='$this->tags', edit_at='$this->edit_at'";
            $sql=$sql." WHERE post_id=".$p_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
        
        function delete($p_id){
            $sql="DELETE FROM posts WHERE post_id=".$p_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
    }

    // $tp=new PostModel();
    // $rs=$tp->selectOne(3);
    // print_r($rs);



?>