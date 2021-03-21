<?php
	@session_start();
	ini_set("display_errors","0");
?>
<?php
 // so san pham da add vao cart
	$prd = 0;
	if(isset($_SESSION['cart']))
	{
		$prd = count($_SESSION['cart']);
	}
?>
<?php
    if(isset($_POST['update_cart']))
    {
        foreach($_POST['soluong'] as $id => $prd)//prd la gia tri nhap vao.moi id tuong ung voi so luong nhap vao
        {
            if(($prd == 0) and (is_numeric($prd)))//nhap vao =0 thi xoa san pham do di
            {
                unset($_SESSION['cart'][$id]);
            }
            elseif(($prd > 0) and (is_numeric($prd)))//nhap vao so luong >0  thi tiep tuc tinh
            {
                $_SESSION['cart'][$id] = $prd;
            }
        }
    }
?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Trang chủ</a></li>
				  <li class="active">Chi tiết đặt hàng</li>
				</ol>
			</div>
			<section id="do_action">
					<div class="container">
						<?php
						$khachhang = mysqli_query($conn,"SELECT * FROM khachhang WHERE email ='".$_SESSION['email']."'");
						$dong_khachhang = mysqli_fetch_array($khachhang);
					?>
						<div class="row">
							<div class="col-sm-6">
								<div class="total_area">
									<ul>
										<h3>Thông tin nhận hàng</h3>
										<li>Tên khách hàng : <?php echo $dong_khachhang['tenKhachHang']; ?></li>
										<li>Số điện thoại : <?php echo $dong_khachhang['SDT']; ?></li>
										<li>Địa chỉ : <?php echo $dong_khachhang['diaChi']; ?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section><!--/#do_action-->
			<form method="post" action="?quanly=dathang">
			<div class="table-responsive cart_info">
				<p style="background-color: orange; text-align: center; font-size: 20px;"><?php if($_SESSION['cart'] != NULL) {echo "Thông tin chi tiết giỏ hàng!";} else{echo"Hiện tại bạn chưa có sản phẩm nào!";} ?></p> 
					<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá sản phẩm</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$tongtien = 0;
							$tongsoluong = 0;
							if($_SESSION['cart'] != NULL)
							{
								foreach($_SESSION['cart'] as $id =>$prd)
								{
								    $arr_id[] = $id;
								}
								$str_id = implode(',',$arr_id);
								$sql_sanpham = "SELECT * FROM  sanpham WHERE idSanPham IN ($str_id) ORDER BY idSanPham ASC";
								$query_sanpham = mysqli_query($conn,$sql_sanpham) or die ('Cannot select table!');
								while ($dong_sanpham = mysqli_fetch_array($query_sanpham))
								    {
						?>	
						<tr>
							<td class="cart_product">
								<a href=""><img src="quantri/admin/modules/sanpham/uploads/<?php echo $dong_sanpham['hinhAnh']; ?>" alt="" width="100px" height="100px"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $dong_sanpham['tenSanPham']; ?></a></h4>
							</td>
							<td class="cart_price">
								<p style="margin-top: 19px;"><?php echo number_format($dong_sanpham['Gia']); ?> VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name ="soluong[<?php echo $dong_sanpham['idSanPham']; ?>]" value="<?php echo $_SESSION['cart'][$dong_sanpham['idSanPham']]; ?>" autocomplete="off" size="2">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" style="margin-top: 19px;"><?php echo number_format($dong_sanpham['Gia']*$_SESSION['cart'][$dong_sanpham['idSanPham']]); ?> VNĐ</p>
							</td>
						</tr>
						<?php
							        $tongtien += $dong_sanpham['Gia']*$_SESSION['cart'][$dong_sanpham['idSanPham']];
									$tongsoluong += $_SESSION['cart'][$dong_sanpham['idSanPham']];			
									}
							}
									    ?>
					</tbody>
				</table>
			</div>
				<input style="float:right;margin-bottom: 10px;" type="submit" name="btDathang" class="btn btn-default update" value="Đặt hàng">
			</form>
		</div>
	</section> <!--/#cart_items-->
