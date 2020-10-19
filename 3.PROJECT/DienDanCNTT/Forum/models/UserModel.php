<?php
    require_once("model.php");


    class UserModel{
        private $user_id;
        private $username;
        private $fullname;
        private $email;
        private $password;
        private $code;
        private $create_at;
        private $admin;
        private $status;
        public $connection;
        const TABLE="users";
        
        function UserModel($username='',$fullname='',$email='',$password='',$admin=''){
            $this->username=$username;
            $this->fullname=$fullname;
            $this->email=$email;
            $this->password=$password;
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
        
        function getOne($id){
            $sql="SELECT * FROM ". self::TABLE . " WHERE user_id='$id' LIMIT 1";
            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
            // chưa xử lý có đk
        }

        function selectByUn($username){
            $sql="SELECT * FROM ". self::TABLE . " WHERE username='$username' LIMIT 1";

            $rs=mysqli_query($this->connection,$sql);
            $result=mysqli_fetch_assoc($rs);
            closeConnect($this->connection);
            return $result;
        }
        
    }

    // $tp=new PostModel();
    // $rs=$tp->selectOne(3);
    // print_r($rs);



?>