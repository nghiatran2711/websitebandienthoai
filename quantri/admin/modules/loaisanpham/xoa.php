<?php
    include('../connection.php');
	$sql_xoa = "delete from loaisanpham where idLoaiSanPham='$_GET[id]' ";
	$run=mysqli_query($conn,$sql_xoa);
    header('Location:../../index.php?quanly=loaisp&ac=lietke');
?>



