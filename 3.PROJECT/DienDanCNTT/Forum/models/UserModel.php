<?php
    require_once("model.php");


    class UserModel{
        private $user_id;
        private $username;
        private $fullname;
        private $email;
        private $avt;
        private $password;
        private $code;
        private $create_at;
        private $admin;
        private $status;
        public $connection;
        const TABLE="users";
        
        function UserModel($username='',$fullname='',$email='',$password='',$avt='',$admin='',$status=''){
            $this->username=$username;
            $this->fullname=$fullname;
            $this->email=$email;
            $this->avt=$avt;
            $this->password=$password;
            $this->admin=$admin;
            $this->status=$status;
            $this->connection=openConnect();
            if(!$this->connection)
            die("khong ket loi dc");
            
        }

        function create(){
            $sql="INSERT INTO ". self::TABLE . " SET username='$this->username' ,fullname='$this->fullname', email='$this->email', password='$this->password'";
            if($this->admin!=='') $sql.=", admin='$this->admin'";
            if($this->status!=='') $sql.=", status='$this->status'";
            $rs=mysqli_query($this->connection,$sql);
            return 1;
        }

        function update($u_id){
            $sql="UPDATE ". self::TABLE . " SET username='$this->username' ,fullname='$this->fullname', email='$this->email', password='$this->password'";
            if($this->admin!=='') $sql.=", admin='$this->admin'";
            if($this->status!=='') $sql.=", status='$this->status'";
            if($this->avt!=='') $sql.=", avt='$this->avt'";
            $sql=$sql." WHERE user_id=".$u_id;
            mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
        function selectAll($data=[]){
            $sql="SELECT * FROM ". self::TABLE;
            $i=0;
            foreach($data as $key=>$value){
                if($i==0){
                    $sql=$sql." WHERE $key='$value'";
                }
                else{
                    $sql=$sql." AND $key='$value'";
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

        function delete($u_id){
            $sql="DELETE FROM ". self::TABLE . " WHERE user_id='$u_id'";
            $rs=mysqli_query($this->connection,$sql);
            closeConnect($this->connection);
            return 1;
        }
        
    }

    // $tp=new PostModel();
    // $rs=$tp->selectOne(3);
    // print_r($rs);



?>