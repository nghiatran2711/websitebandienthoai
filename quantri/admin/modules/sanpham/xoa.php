<?php
    include('../connection.php');
	$sql_xoa = "delete from sanpham where idSanPham='$_GET[id]' ";
	$run=mysqli_query($conn,$sql_xoa);
    header('location:../../index.php?quanly=sanpham&ac=lietke');
?>

