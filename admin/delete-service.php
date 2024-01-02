<?php 
include_once('functions/function.php');
needlogged();

$service=$_GET['D'];
$BDEL="DELETE FROM service WHERE ser_id='$service'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-service.php');
}else{
	echo "FAILED";
}

?>