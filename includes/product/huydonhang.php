<?php 
	$id=$_GET['id'];
	$sql_donhang = mysqli_query($conn,"SELECT * FROM donhang WHERE idDonHang='".$id."'");
	$sql_chitietdonhang= mysqli_query($conn,"SELECT * FROM chitietdonhang WHERE idDonHang = '".$id."'");
?>
 	<?php
 	//Vòng lặp những thông tin trong  table chitietgiohang 
 		while ($dong=mysqli_fetch_array($sql_chitietdonhang)) {
 			//select nhung san pham co cung id voi san pham trong chi tiet don hang
	 	 $sql_sanpham = mysqli_query($conn,"SELECT * FROM sanpham WHERE idSanPham= ".$dong['idSanPham']." ORDER BY idSanPham ASC");
	 	 //Vòng lặp để upload lại số lượng sản phẩm trong kho
		 	 while ($dong1=mysqli_fetch_array($sql_sanpham)) {
		 	 	$soluong=$dong1['soLuong'] + $dong['quantity'];
		 	 	$update=mysqli_query($conn,"UPDATE sanpham SET soLuong='$soluong' WHERE idSanPham='".$dong1['idSanPham']."'");
		 	 }
	}
			 	 	$sql_deletechitietsanpham=mysqli_query($conn,"DELETE FROM chitietdonhang
	WHERE idDonHang ='".$id."'");
		 	 	$sql_deletedonhang=mysqli_query($conn,"DELETE FROM donhang
	WHERE idDonHang ='".$id."'");
	header('location:index.php?quanly=xemdonhang');
?>

