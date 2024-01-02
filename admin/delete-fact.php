<?php 
include_once('functions/function.php');
needlogged();

$fact=$_GET['D'];
$BDEL="DELETE FROM facts WHERE fact_id='$fact'";
if(mysqli_query($con,$BDEL)){
	header('Location: all-fact.php');
}else{
	echo "FAILED";
}

?>