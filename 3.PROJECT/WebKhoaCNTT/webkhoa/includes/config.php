<?php
    $conn = mysqli_connect('localhost','root','','webkhoa');
    if($conn->connect_error) {
        die('Database connection error: '.$conn->connect_error);
    } 
?>