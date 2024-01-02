<?php 
include_once('functions/function.php');
needlogged();

$contact=$_GET['D'];
$BDEL="DELETE FROM contact WHERE con_id='$contact'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-message.php');
}else{
	echo "FAILED";
}

?>