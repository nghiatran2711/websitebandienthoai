<?php
	session_start();
	unset($_SESSION['dangnhap1']);
	header('location:../../login.php');
?>