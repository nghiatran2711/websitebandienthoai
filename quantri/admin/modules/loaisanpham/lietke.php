<?php
$sql_lietkelsp = "select * from loaisanpham order by idLoaiSanPham desc ";
$row_lietkelsp = mysqli_query($conn, $sql_lietkelsp);
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Loại sản phẩm
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Số thứ tự</th>
            <th>Mã loại sản phẩm</th>
            <th>Tên loại sản phẩm</th>
            <th style="width:100px;">Thao tác</th>
          </tr>
        </thead>
        <?php
        $i = 1;
        while ($dong = mysqli_fetch_array($row_lietkelsp)) {
            ?>
        <tbody>
          <tr>
            <td><?php echo $i; ?></td>
            <td><span class="text-ellipsis"><?php echo $dong['idLoaiSanPham'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['tenLoaiSanPham'] ?></span></td>
            <td>
              <a href="index.php?quanly=loaisp&ac=sua&id=<?php echo $dong['idLoaiSanPham'] ?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i></a>
              <a href="modules/loaisanpham/xoa.php?id=<?php echo $dong['idLoaiSanPham'] ?>" class="active" ui-toggle-class=""> <i class="fa fa-trash-o"></i></a>
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
</div>