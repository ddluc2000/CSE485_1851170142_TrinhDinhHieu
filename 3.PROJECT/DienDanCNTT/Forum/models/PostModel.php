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
            $body=$this->body;
            $_body = mysqli_real_escape_string($this->connection,$body);
            $sql="INSERT INTO ". self::TABLE . " SET title='$this->title' ,body='$_body', tags='$this->tags', user_id='$this->user_id', topic_id='$this->topic_id'";
            if($this->mitopic_id!=="") $sql=$sql." , mitopic_id='$this->mitopic_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

 
        function getPostInTP($tp_id){
            $sql="SELECT p.*,u.username,u.user_id,u.avt FROM posts As p JOIN users as u ON p.user_id=u.user_id WHERE p.topic_id='$tp_id' ORDER BY p.post_id DESC";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
        }

        function getPostInMTP($mtp_id){
            $sql="SELECT p.*,u.username,u.user_id,u.avt FROM posts As p JOIN users as u ON p.user_id=u.user_id WHERE p.mitopic_id='$mtp_id' ORDER BY p.post_id DESC";
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

        function getNewPost(){
            $sql="SELECT p.title,p.post_id,u.username,p.user_id,p.create_at FROM posts As p JOIN users As u ON p.user_id=u.user_id ORDER BY post_id DESC LIMIT 7";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        public function upviews($p_id){
            $sql = "SELECT views FROM ".self::TABLE." WHERE post_id=".$p_id;
            $result=mysqli_query($this->connection,$sql);
            $views=mysqli_fetch_assoc($result);
            $view=$views['views']+1;
            $sql = "UPDATE ". self::TABLE ." set views=".$view;            
            $sql=$sql." WHERE post_id=".$p_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function update($p_id){
            $body=$this->body;
            $_body = mysqli_real_escape_string($this->connection,$body);
            $sql = "UPDATE ". self::TABLE . " SET title='$this->title' ,body='$_body', tags='$this->tags', edit_at='$this->edit_at'";
            $sql=$sql." WHERE post_id=".$p_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function close($p_id){
            $sql = "UPDATE ". self::TABLE . " SET status='0'";
            $sql=$sql." WHERE post_id=".$p_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        function open($p_id){
            $sql = "UPDATE ". self::TABLE . " SET status='1'";
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

        public function searchPosts($val){
            global $conn;
            $match = '%' . $val . '%';
            $sql="SELECT p.*,u.username,u.avt 
                    FROM posts As p 
                    JOIN users as u 
                    ON p.user_id=u.user_id 
                    WHERE p.title like '".$match."' OR p.body like '".$match."'";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
        }
    // $tp=new PostModel();
    // $rs=$tp->selectOne(3);
    // print_r($rs);

    }

?>