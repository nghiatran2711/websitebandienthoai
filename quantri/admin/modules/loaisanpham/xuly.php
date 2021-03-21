<?php
	include('../connection.php');
	$idLoaiSanPham=$_POST['idLoaiSanPham'];
	$tenLoaiSanPham=$_POST['tenLoaiSanPham'];
	
	if(isset($_POST['them'])){
		if($tenLoaiSanPham == ""){
			header('location:../../index.php?quanly=loaisp&ac=them');
		}else{
			//them
			$sql_them=("insert into loaisanpham (tenLoaiSanPham) value('$tenLoaiSanPham')");
			mysqli_query($conn,$sql_them);
			header('location:../../index.php?quanly=loaisp&ac=lietke');
		}
	}elseif(isset($_POST['sua'])){
		//sua
		$sql_sua = "update loaisanpham set idLoaiSanPham='$idLoaiSanPham',tenLoaiSanPham='$tenLoaiSanPham' where idLoaiSanPham='$_GET[id]'";
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=loaisp&ac=lietke');
	}
?>
