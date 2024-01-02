<?php 
include_once('functions/function.php');
needlogged();

$team=$_GET['D'];
$BDEL="DELETE FROM team WHERE team_id='$team'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-team.php');
}else{
	echo "FAILED";
}

?>