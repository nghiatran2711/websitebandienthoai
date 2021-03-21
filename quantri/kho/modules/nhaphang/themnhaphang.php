<?php 
	@session_start();
	if (isset($_POST['nhaphang'])) {
		$idsanpham = $_POST['idsanpham'];
		$soluong=$_POST['soluong'];
		$prd = NULL;
		if(isset($_SESSION['nhaphang'][$idsanpham]))
			{
				$prd = $_SESSION['nhaphang'][$idsanpham]+ $soluong ;
			}
		else
			{
				$prd = $soluong;
			}
			$_SESSION['nhaphang'][$idsanpham] = $prd;
		header('location:index.php?quanly=nhaphang&ac=lietke');
	}
 ?>