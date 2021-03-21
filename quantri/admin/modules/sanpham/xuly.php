<?php
	include('../connection.php');
	$idSanPham=$_POST['idSanPham'];
    $idNSX=$_POST['idNSX'];
    $tenSanPham=$_POST['tenSanPham'];
	$hinhAnh=$_FILES['hinhAnh']['name'];
	$hinhAnh_tmp=$_FILES['hinhAnh']['tmp_name'];    
	move_uploaded_file($hinhAnh_tmp,'uploads/'.$hinhAnh);
    $idLoaiSanPham=$_POST['idLoaiSanPham'];
	$Gia=$_POST['Gia'];
	
	if(isset($_POST['them'])){
		if($tenSanPham == "" || $hinhAnh == "" || $idNSX == "" || $idLoaiSanPham == "" || $Gia == ""){
			header('location:../../index.php?quanly=sanpham&ac=them');
		}else{
			//them
			 $sql_them=("insert into sanpham(tenSanPham,hinhAnh,idNSX,idLoaiSanPham,soLuong,Gia) value('$tenSanPham','$hinhAnh','$idNSX','$idLoaiSanPham','0','$Gia')");
			mysqli_query($conn,$sql_them);
			header('location:../../index.php?quanly=sanpham&ac=lietke');
		}
	}elseif(isset($_POST['sua'])){
		//sua
		if($hinhAnh!=''){
            $sql_sua = "update sanpham set idSanPham='$idSanPham',idNSX='$idNSX',tenSanPham='$tenSanPham',hinhAnh='$hinhAnh',idLoaiSanPham='$idLoaiSanPham',Gia='$Gia',soLuong=$soLuong where idSanPham='$_GET[id]'";
		}else{
			$sql_sua = "update sanpham set idSanPham='$idSanPham',idNSX='$idNSX',tenSanPham='$tenSanPham',idLoaiSanPham='$idLoaiSanPham',Gia='$Gia' where idSanPham='$_GET[id]'";
		}
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}
?>
