
<?php

$conn = mysqli_connect('localhost','root','','web_ver1');
if(!$conn)
{
   die('khong ket noi dc');
}

// $sql="SELECT * FROM users";
// $stmt=$conn->prepare($sql);
// $stmt->execute();
//             // $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
// $records=mysqli_fetch_all($stmt->get_result(),MYSQLI_ASSOC);
// var_dump($records);

?>
