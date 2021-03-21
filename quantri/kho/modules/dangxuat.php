<?php
	session_start();
	unset($_SESSION['dangnhap2']);
	header('location:../../login.php');
?>