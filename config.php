<?php 

$db_host='localhost';
$db_user='root';
$db_pass='';
$db_name='finalproject';

$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(!$con){
    echo 'Database Connection Error.';
}


?>