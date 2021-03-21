<?php 
	$id = $_GET['id'];
	$sql_lietkesp = "select * from chitietdonhang,sanpham where idDonHang='".$id."' and chitietdonhang.idSanPham=sanpham.idSanPham order by idDonHang desc";
	$query_lietkesp = mysqli_query($conn, $sql_lietkesp);
 ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Trang chủ</a></li>
				  <li class="active">Đơn hàng của bạn</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<p style="background-color: orange; text-align: center; font-size: 20px;">Đơn hàng của bạn</p>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">STT</td>
							<td class="description">Mã đơn hàng</td>
							<td class="price">Tên sản phẩm</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
						</tr>
					</thead>
					<?php 
						$i=1;
						while ($dong=mysqli_fetch_array($query_lietkesp)) {
					 ?>
					<tbody>
						<tr>
							<td><?php echo $i; ?></td>
		                    <td><?php echo $dong['idDonHang'] ?></td>
		                    <td><?php echo $dong['tenSanPham'] ?></td>
		                    <td><?php echo $dong['quantity'] ?></td>
		                    <td><?php echo $dong['tongTien'] ?></td>
						</tr>
					</tbody>
					 <?php
                        $i++;
                    }
                    ?>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->