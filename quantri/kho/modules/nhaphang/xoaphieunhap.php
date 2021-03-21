<?php 
	@session_start();
	$id = $_GET['id'];
	if($id == 0 )
	{
		unset($_SESSION['nhaphang']);
	}
	else
	{
		unset($_SESSION['nhaphang'][$id]);
	}
	header('location:index.php?quanly=nhaphang&ac=lietke');
?>