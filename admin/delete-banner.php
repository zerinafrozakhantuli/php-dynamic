<?php 
include_once('functions/function.php');
needlogged();

$Banner=$_GET['D'];
$BDEL="DELETE FROM banner WHERE ban_id='$Banner'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-banner.php');
}else{
	echo "FAILED";
}

?>