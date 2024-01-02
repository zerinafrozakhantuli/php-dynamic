<?php 
include_once('functions/function.php');
needlogged();

$about=$_GET['D'];
$BDEL="DELETE FROM about WHERE about_id='$about'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-about.php');
}else{
	echo "FAILED";
}

?>