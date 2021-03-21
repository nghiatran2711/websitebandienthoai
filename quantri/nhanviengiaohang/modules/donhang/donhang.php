<?php
ini_set("display_errors","0");
$result = mysqli_query($conn, 'select count(idDonHang) as total from donhang where tinhTrang="1" or tinhTrang="2" or tinhTrang="3" or tinhTrang="4"');
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
$sql_lietkedh = "select * from donhang,khachhang where khachhang.idKhachHang=donhang.idKhachHang and donhang.tinhTrang='1' or donhang.tinhTrang='2' or donhang.tinhTrang='3' or donhang.tinhTrang='4' order by donhang.idDonHang desc limit $start, $limit";
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
              <th>Nhân viên giao hàng</th>
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
              <?php 
                $sql_nhanvien=mysqli_query($conn,"SELECT tenNhanVien FROM nhanvien WHERE idNhanVien ='".$dong['idNhanVien']."' limit 1");
                $dong_nhanvien=mysqli_fetch_array($sql_nhanvien);
                echo $dong_nhanvien['tenNhanVien'];
              ?>  
            </td>
            <td>
              <?php 
                if ($dong['tinhTrang']==1) {      
              ?>
              <?php echo 'Đơn hàng mới (Liên hệ kho để lấy hàng)'; ?>
              <?php 
                }elseif($dong['tinhTrang']==2){
              ?>
                  <a href="?quanly=tinhtrang1&ac=xuly&id=<?php echo $dong['idDonHang'] ?>">Đã nhận</a>
                  <a href="?quanly=tinhtrang2&ac=xuly&id=<?php echo $dong['idDonHang'] ?>">Không nhận</a>
              <?php 
                }elseif($dong['tinhTrang']==3) {
              ?>
              <?php echo 'Đã nhận'; ?>                 
              <?php 
                }elseif($dong['tinhTrang']==4) {
                  echo 'Không nhận';
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
