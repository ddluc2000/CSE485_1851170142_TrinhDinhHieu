<?php 
$date=getdate();
$time=$date['year']."-".$date['mon']."-".$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
echo $time;
?>