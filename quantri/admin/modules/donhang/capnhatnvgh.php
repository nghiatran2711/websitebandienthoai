<?php 
	include('connection.php');
	$id1=$_GET['id1'];
	$id2=$_GET['id2'];
	$update="UPDATE donhang SET idNhanVien='$id1' WHERE idDonHang='".$id2."'";
	$query=mysqli_query($conn,$update);
	$update="UPDATE donhang SET tinhTrang='1' WHERE idDonHang='".$id2."'";
	$query=mysqli_query($conn,$update);
	header('location:index.php?quanly=donhang&ac=lietke');
 ?>