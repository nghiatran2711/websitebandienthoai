<?php
	session_start();
	unset($_SESSION['dangnhap3']);
	header('location:../../login.php');
?>