<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'blog-for-beginners' );
if($connection == false){
	echo 'False connection with database!' . mysqli_connect_error();
	exit();
}
?>