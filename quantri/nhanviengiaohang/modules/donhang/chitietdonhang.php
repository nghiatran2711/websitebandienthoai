<?php
	$id = $_GET['id'];
	$sql_lietkesp = "select * from chitietdonhang,sanpham where idDonHang='".$id."' and chitietdonhang.idSanPham=sanpham.idSanPham order by idDonHang desc";
	$row_lietkesp = mysqli_query($conn, $sql_lietkesp);
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Số thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <?php
        $i = 1;
        while ($dong = mysqli_fetch_array($row_lietkesp)) {
            ?>
        <tbody>
          <tr>
            <td><?php echo $i; ?></td>
            <td><span class="text-ellipsis"><?php echo $dong['idDonHang'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['tenSanPham'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['quantity'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['tongTien'] ?></span></td>
          </tr>
        </tbody>
        <?php
            $i++;
        }
        ?>
      </table>
    </div>
  </div>
</div>