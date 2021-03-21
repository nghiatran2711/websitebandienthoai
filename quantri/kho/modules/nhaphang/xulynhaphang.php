<?php
	@session_start();
	$sql_nhanvien="select * from nhanvien where Email = '".$_SESSION['dangnhap1']."'";
	$query_nhanvien=mysqli_query($conn,$sql_nhanvien);
	$row=mysqli_fetch_array($query_nhanvien);
	if(isset($_POST['btnhaphang']) && isset($_SESSION['nhaphang']) && isset($_SESSION['dangnhap1']) )
	{
		$idnv=$row['idNhanVien'];
		$ngayhientai = date('Y-m-d H:i:s');
		if($_SESSION['nhaphang'] != NULL)
		{
			foreach($_SESSION['nhaphang'] as $idsanpham =>$prd)
			{
				$arr_id[] = $idsanpham;
			}
			$str_id = implode(',',$arr_id);
			// echo $str_id;
			$insert = mysqli_query($conn,"INSERT INTO phieunhap(idNhanVien,ngayNhap) VALUES (N'".$idnv."',N'".$ngayhientai."')");
			$last_id=mysqli_insert_id($conn);
			$sql_sanpham = "SELECT * FROM  sanpham WHERE idSanPham IN ($str_id) ORDER BY idSanPham ASC";
			$query_sanpham = mysqli_query($conn,$sql_sanpham) or die ('Cannot select table!');
			while ($rows = mysqli_fetch_array($query_sanpham))
			{
				// insert thông tin nhập hàng vào chi tiết đơn hàng.
				$insert1 = mysqli_query($conn,"INSERT INTO chitietphieunhap(idSanPham,idPhieuNhap,soLuong) VALUES ('".$rows['idSanPham']."','".$last_id."','".$_SESSION['nhaphang'][$rows['idSanPham']]."')");
				// soLuong bằng số lượng hiện tại của sản phẩm cộng với số lượng nhập vào.
				$soLuong=$rows['soLuong']+$_SESSION['nhaphang'][$rows['idSanPham']];
				// Cập nhật số lượng của sản phẩm trong kho.
				$update=mysqli_query($conn,"UPDATE sanpham set soLuong='$soLuong' where idSanPham='".$rows['idSanPham']."'");
			}
			mysqli_close($conn);
			echo '<span class="sc_infor">Bạn đã nhập hàng thành công </span>';
			unset($_SESSION['nhaphang']);
			echo '<span class="sc_inforr">Ấn vào <strong><a href="index.php" class="day">đây</a></strong> để quay lại trang chủ!</span>';
		}
	}
?>