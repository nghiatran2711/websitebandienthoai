<?php 
	@session_start();
	if(isset($_POST['themgiohang'])){
		$id=$_POST['idsanpham'];
		$soluong=$_POST['soluong'];
		$prd = NULL;
		if(isset($_SESSION['cart'][$id]))
		{
			$prd = $_SESSION['cart'][$id] + $soluong;
		}
		else
		{
			$prd = $soluong;
		}
		$_SESSION['cart'][$id] = $prd;
		header('location:index.php?quanly=giohang');
	} 
?>