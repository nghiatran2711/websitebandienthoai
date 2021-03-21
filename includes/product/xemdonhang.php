<?php
    if(isset($_SESSION['email'])){
        $sql_khachhang="SELECT * FROM khachhang WHERE email ='".$_SESSION['email']."'";
        $query_khachhang=mysqli_query($conn,$sql_khachhang);
        $dongkh=mysqli_fetch_array($query_khachhang);
        $idKhachHang=$conn -> real_escape_string($dongkh['idKhachHang']);
    }
    $sql_lietkesp = "SELECT * FROM donhang WHERE idKhachHang= $idKhachHang ORDER BY donhang.idDonHang DESC";
    $row_lietkesp = mysqli_query($conn, $sql_lietkesp);
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
							<td class="price">Ngày đặt</td>
							<td class="quantity">Ngày giao dự kiến</td>
							<td class="total">Tổng tiền</td>
							<td class="total">Chi tiết đơn hàng</td>
							<td class="total">tình trạng</td>
						</tr>
					</thead>
					<?php 
						$i=1;
						while ($dong=mysqli_fetch_array($row_lietkesp)) {
					 ?>
					<tbody>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $dong['idDonHang'] ?></td>
							<td><?php echo $dong['ngayDat'] ?></td>
							<td><?php echo $dong['ngayGiaoDuKien'] ?></td>
							<td><?php echo $dong['tongTien'] ?></td>
							<td><a href="?quanly=chitietdonhang&id=<?php echo $dong['idDonHang']?>">Xem chi tiết</a></td>
                            <td>
            					<?php 
            						if($dong['tinhTrang']==0){
            					?>
                                <?php 
                                    echo 'Đang chờ duyệt<br>';
                                ?> 
                                    <a href="?quanly=huydonhang&id=<?php echo $dong['idDonHang'] ?>">Hủy đơn hàng</a>
            					<?php 
            						}elseif($dong['tinhTrang']==1) {
            					?>

            					<?php 
            						echo 'Đơn hàng đã được duyệt';
            					?>
            								 
            					<?php 
            						}elseif($dong['tinhTrang']==2) {

            					?>

            					<?php 
                                    echo 'Đang giao hàng';
                                ?>

            					<?php 
            						}elseif($dong['tinhTrang']==3) {
            					?>
                                <?php 
                                    echo 'Đã nhận';
                                ?>
                                <?php 
                                    }elseif($dong['tinhTrang']==4) {
                                ?>
                                <?php 
                                    echo 'Thất bại';
                                ?>
                                <?php 
                                    }
                                ?>
            				</td>
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