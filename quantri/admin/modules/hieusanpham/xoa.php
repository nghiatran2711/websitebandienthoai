<?php
    include('../connection.php');
	$sql_xoa = "delete from nhasx where idNSX='$_GET[id]' ";
	$run=mysqli_query($conn,$sql_xoa);
    header('Location:../../index.php?quanly=loaisp&ac=lietke');
?>



