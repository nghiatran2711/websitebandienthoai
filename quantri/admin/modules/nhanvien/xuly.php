<?php
	include('../connection.php');
	$tennhanvien=$_POST['tennhanvien'];
	$cmnd=$_POST['cmnd'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$matkhau=$_POST['matkhau'];
	$diachi=$_POST['diachi'];
	$idquyen=$_POST['idQuyen'];
	
	if(isset($_POST['them'])){
		if($tennhanvien == "" || $cmnd == "" || $sdt == "" || $email == "" || $matkhau == "" || $diachi == "" || $idquyen == ""){
			header('location:../../index.php?quanly=nhanvien&ac=them');
		}else{
			//them
			 $sql_them=("insert into nhanvien(tenNhanVien,CMND,SDT,Email,matKhau,diaChi,idQuyen) value('$tennhanvien','$cmnd','$sdt','$email','$matkhau','$diachi','$idquyen')");
			mysqli_query($conn,$sql_them);
			header('location:../../index.php?quanly=nhanvien&ac=lietke');
		}
	}elseif(isset($_POST['sua'])){
		//sua
			$sql_sua = "update nhanvien set tenNhanVien='$tennhanvien',CMND='$cmnd',SDT='$sdt',Email='$email',matKhau='$matkhau',diaChi='$diachi',idQuyen='$idquyen' where idNhanVien='$_GET[id]'";
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=nhanvien&ac=lietke');
	}
?>