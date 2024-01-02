<?php 
include_once('functions/function.php');
needlogged();

$skill=$_GET['D'];
$BDEL="DELETE FROM skill WHERE skill_id='$skill'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-skill.php');
}else{
	echo "FAILED";
}

?>