<?php 
include_once('functions/function.php');
needlogged();

$project=$_GET['D'];
$BDEL="DELETE FROM project WHERE pro_id='$project'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-project.php');
}else{
	echo "FAILED";
}

?>