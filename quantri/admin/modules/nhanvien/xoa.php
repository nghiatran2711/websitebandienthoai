<?php
    include('../connection.php');
	$sql_xoa = "delete from nhanvien where idNhanVien='$_GET[id]' ";
	$run=mysqli_query($conn,$sql_xoa);
    header('location:../../index.php?quanly=nhanvien&ac=lietke');
?>

