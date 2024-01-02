<?php
include_once('functions/function.php');
needlogged();

$delete=$_GET['D'];
$DEL="DELETE FROM users WHERE user_id='$delete'";
if(mysqli_query($con,$DEL)){
	header('Location: all-user.php');
}else{
	echo 'FAILED';
}

?>