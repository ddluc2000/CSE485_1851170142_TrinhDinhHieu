<!-- CÁC HÀM XỬ LÝ Ở ĐÂY SẼ CHUYỂN VỀ CHO ĐỐI TƯỢNG -->


<?php
    include("connect.php");
    $table="users";
    

    function selectAll($table,$data=""){
        global $conn;
        $sql="SELECT * FROM $table";
        $rs=mysqli_query($conn,$sql);
        $result=mysqli_fetch_all($rs,MYSQLI_ASSOC);
        print_r($result);
        return $result;
        // chưa xử lý có đk
    }
?>