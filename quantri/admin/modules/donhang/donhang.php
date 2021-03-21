<?php
ini_set("display_errors","0");
$result = mysqli_query($conn, 'select count(idDonHang) as total from donhang');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
$start = ($current_page - 1) * $limit;
$sql_lietkedh = "select * from donhang,khachhang where donhang.idNhanVien is NULL and khachhang.idKhachHang=donhang.idKhachHang order by donhang.idDonHang desc limit $start, $limit ";
$row_lietkedh = mysqli_query($conn, $sql_lietkedh);
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Đơn hàng
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Số thứ tự</th>
              <th>Mã đơn hàng</th>
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>Ngày đặt</th>
              <th>Ngày giao dự kiến</th>
              <th>Tổng tiền</th>
              <th>Chi tiết đơn hàng</th>
              <th>Chọn nhân viên giao hàng</th>
              <th>tình trạng</th>
            </tr>
          </thead>
          <?php
            $i = 1;
            while ($dong = mysqli_fetch_array($row_lietkedh)) {
          ?>
        <tbody>
          <tr>
            <td><?php echo $i; ?></td>
            <td><span class="text-ellipsis"><?php echo $dong['idDonHang'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['tenKhachHang'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['SDT'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['diaChi'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['ngayDat'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['ngayGiaoDuKien'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo number_format($dong['tongTien']) ?> VNĐ</span></td>
            <td><a href="?quanly=chitietdonhang&ac=lietke&id=<?php echo $dong['idDonHang']?>">Xem chi tiết</a></td>
            <td>

              <div class="w3-dropdown-click">
                <button onclick="myFunction()" class="w3-button w3-black">Chọn nhân viên giao</button>
                <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
                  <?php
                    $sql_nhanvien="select * from nhanvien where idQuyen='3' order by idNhanVien asc";
                    $row_nhanvien= mysqli_query($conn, $sql_nhanvien);
                  ?>
                  <?php 
                    while ($dong_nhanvien= mysqli_fetch_array($row_nhanvien)){
                  ?>
                  <a href="?quanly=nvgh&ac=capnhat&id1=<?php echo $dong_nhanvien['idNhanVien'] ?>&id2=<?php echo $dong['idDonHang'] ?>" class="w3-bar-item w3-button"><?php echo $dong_nhanvien['tenNhanVien']?></a>
                  <?php
                    }
                  ?>
                </div>
              </div>

            </td>
            <td><span class="text-ellipsis"></span></td>
          </tr>
        </tbody>
          <?php
            $i++;
        }
        ?>
      </table>
      </div>
      <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-7 text-right text-center-xs">
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <?php
                if ($current_page > 1 && $total_page > 1){
                    echo'<li><a href="index.php?quanly=donhang&ac=lietke&page='.($current_page-1).'"><i class="fa fa-chevron-left"></i></a></li>';
                }
                for ($i = 1; $i <= $total_page; $i++){
                    if ($i == $current_page){
                        echo '<li><a href="">'.$i.'</a></li> ';
                    }else{
                        echo '<li><a href="index.php?quanly=donhang&ac=lietke&page='.$i.'">'.$i.'</a></li>';
                    }
                }
                if ($current_page < $total_page && $total_page > 1){
                    echo '<li class="page-item"><a class="page-link" href="index.php?quanly=donhang&ac=lietke&page='.($current_page+1).'"><i class="fa fa-chevron-right"></i></a></li>';
                }
                ?>
            </ul>
        </div>
      </div>
    </footer>
    </div>
</div>
