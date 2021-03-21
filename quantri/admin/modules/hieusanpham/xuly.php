<?php
	include('../connection.php');
	$idNSX=$_POST['idNSX'];
	$tenNSX=$_POST['tenNSX'];
	
	if(isset($_POST['them'])){
		if($tenNSX == ""){
			header('location:../../index.php?quanly=hieusp&ac=them');
		}else{
			//them
			$sql_them=("insert into nhasx (tenNSX) value('$tenNSX')");
			mysqli_query($conn,$sql_them);
			header('location:../../index.php?quanly=hieusp&ac=lietke');
		}
	}elseif(isset($_POST['sua'])){
		//sua
		$sql_sua = "update nhasx set idNSX='$idNSX',tenNSX='$tenNSX' where idNSX='$_GET[id]'";
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=hieusp&ac=lietke');
	}
?>
