<?php
    require_once("model.php");


    class ReportModel{
        private $rp_id;
        private $content;
        private $create_at;
        private $post_id;
        private $user_id;
        private $cm_id;
        private $us_reported_id;
        public $connection;
        const TABLE="reports";
        
        function ReportModel($content="",$post_id="",$user_id="",$cm_id="",$us_reported_id=""){
            $this->content=$content;
            $this->post_id=$post_id;
            $this->user_id=$user_id;
            $this->cm_id=$cm_id;
            $this->us_reported_id=$us_reported_id;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function create(){
            $sql="INSERT INTO ". self::TABLE ." SET content='$this->content', post_id='$this->post_id', user_id='$this->user_id', cm_id='$this->cm_id', us_reported_id='$us_reported_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }

        

        // CHUA CHUAN HOA LAJ
        function selectAll(){
            $sql="SELECT * FROM ". self::TABLE;
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }
        
        // function getOne($id){
        //     $sql="SELECT * FROM ". self::TABLE . " WHERE cm_id='$id' LIMIT 1";

        //     $rs=mysqli_query($this->connection,$sql);
        //     $result=mysqli_fetch_assoc($rs);
        //     closeConnect($this->connection);
        //     return $result;
        //     // chưa xử lý có đk
        // }
        


        // function deleteAll($p_id){
        //     $sql="DELETE FROM comments WHERE post_id=".$p_id;
        //     mysqli_query($this->connection,$sql);
        //     closeConnect($this->connection);
        //     return 1;
        // }

        // function deleteOne($cm_id){
        //     $sql="DELETE FROM comments WHERE cm_id=".$cm_id;
        //     mysqli_query($this->connection,$sql);
        //     closeConnect($this->connection);
        //     return 1;
        // }
    }



?>