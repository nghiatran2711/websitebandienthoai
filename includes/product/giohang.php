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
<form method="post" action="">
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
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
							<td></td>
							<td></td>
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
							<td>
								<input style="margin-bottom: 19px;" type="submit" name="update_cart" class="btn btn-default update" value="Cập nhật">
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="?quanly=xoagiohang&id=<?php echo $dong_sanpham['idSanPham']; ?>"><i class="fa fa-times"></i></a>
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
		</div>
	</section> <!--/#cart_items-->
<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng số lượng<span><?php echo $tongsoluong; ?></span></li>
							<li>Tổng tiền <span><?php echo number_format($tongtien); ?> VNĐ</span></li>
						</ul>
						<a class="btn btn-default check_out" style="width:160px;" href="index.php">Tiếp tục mua hàng</a>
						<?php
								if(isset($_SESSION['email']))
								{
									echo '<a class="btn btn-default check_out" style="display:block; width:90px;" href="?quanly=chitietgiohang">Đặt hàng</a>';
								echo '<a class="btn btn-default check_out" style="display:none;width:90px;" href="?quanly=dangnhap" style="display:none;">Đặt hàng</a>';
								}
								else
								{
									echo '<a class="btn btn-default check_out" style="display:none;width:90px;" href="?quanly=chitietgiohang">Đặt hàng</a>';
								 	echo '<a class="btn btn-default check_out" style="display:block;width:90px;" href="?quanly=dangnhap" style="display:none;">Đặt hàng</a>';
								}
							?>

					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
</form>