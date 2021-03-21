<?php
	@session_start();
	ini_set("display_errors","0");
?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
				<?php
					$khachhang = mysqli_query($conn,"SELECT * FROM khachhang WHERE email ='".$_SESSION['email']."'");
					$dong_khachhang = mysqli_fetch_array($khachhang);
				?>
				<?php
					if(isset($_POST['btDathang']) && isset($_SESSION['email']) && isset($_SESSION['cart']) )
					{
									
						$idkhachhang=$dong_khachhang['idKhachHang'];
						$tongtien = 0;
						$ngayhientai = date('Y-m-d H:i:s');
						$ngaydat = strtotime($ngayhientai);
						$ngaygiaodukien = strtotime("+7 day", $ngaydat);
						$ngaydathang=date('Y-m-d H:i:s', $ngaydat); 
						$ngaygiaodukienhang=date('Y-m-d H:i:s', $ngaygiaodukien);
						if($_SESSION['cart'] != NULL)
						{
							foreach($_SESSION['cart'] as $id =>$prd)
							{
								$arr_id[] = $id;
							}
							$str_id = implode(',',$arr_id);
							$sanpham = "SELECT * FROM  sanpham WHERE idSanPham IN ($str_id) ORDER BY idSanPham ASC";
							$query_sanpham = mysqli_query($conn,$sanpham) or die ('Cannot select table!');
							while($dong_sanpham = mysqli_fetch_array($query_sanpham)){
								$tongtien += $dong_sanpham['Gia']*$_SESSION['cart'][$dong_sanpham['idSanPham']];
							}
							$insert = mysqli_query($conn,"INSERT INTO donhang(idKhachHang,ngayDat,ngayGiaoDuKien,tongTien,tinhTrang) VALUES ('".$idkhachhang."','".$ngaydathang."','".$ngaygiaodukienhang."','".$tongtien."','0')");
							mysqli_query($conn,$insert);
							$last_id=mysqli_insert_id($conn);
							$sanpham1 = "SELECT * FROM  sanpham WHERE idSanPham IN ($str_id) ORDER BY idSanPham ASC";
							$query_sanpham1 = mysqli_query($conn,$sanpham1) or die ('Cannot select table!');
							while ($dong_sanpham1 = mysqli_fetch_array($query_sanpham1))
								{
									$insert1 = mysqli_query($conn,"INSERT INTO chitietdonhang(idSanPham,idDonHang,quantity,tongTien) VALUES ('".$dong_sanpham1['idSanPham']."','".$last_id."','".$_SESSION['cart'][$dong_sanpham1['idSanPham']]."','".$dong_sanpham1['Gia']*$_SESSION['cart'][$dong_sanpham1['idSanPham']]."')");
									// soLuong bằng số lượng hiện tại của sản phẩm trừ với số lượng mua vào.
									$soluong=$dong_sanpham1['soLuong']-$_SESSION['cart'][$dong_sanpham1['idSanPham']];
									// cập nhật số lượng sản phẩm sau khi khách hàng đặt hàng
									$update = mysqli_query($conn,"UPDATE sanpham SET soLuong='$soluong' WHERE idSanPham='".$dong_sanpham1['idSanPham']."'");
								}
								mysqli_close($conn);
								echo '<h1>Đặt hàng thành công</h1>';
								unset($_SESSION['cart']);
								echo '<span><a href="index.php">Quay lại trang chủ</a></span>';
						}
					}
							?>
    </div><!--end container-->
</section>
