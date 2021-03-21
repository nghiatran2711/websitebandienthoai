<?php
$sql_lietke = "select * from nhasx order by idNSX desc ";
$row_lietke = mysqli_query($conn, $sql_lietke);
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Hiệu sản phẩm
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Số thứ tự</th>
            <th>Mã hiệu sản phẩm</th>
            <th>Tên hiệu sản phẩm</th>
            <th style="width:100px;">Thao tác</th>
          </tr>
        </thead>
        <?php
        $i = 1;
        while ($dong = mysqli_fetch_array($row_lietke)) {
            ?>
        <tbody>
          <tr>
            <td><?php echo $i; ?></td>
            <td><span class="text-ellipsis"><?php echo $dong['idNSX'] ?></span></td>
            <td><span class="text-ellipsis"><?php echo $dong['tenNSX'] ?></span></td>
            <td>
              <a href="index.php?quanly=hieusp&ac=sua&id=<?php echo $dong['idNSX'] ?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i></a>
              <a href="modules/hieusanpham/xoa.php?id=<?php echo $dong['idNSX'] ?>" class="active" ui-toggle-class=""> <i class="fa fa-trash-o"></i></a>
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