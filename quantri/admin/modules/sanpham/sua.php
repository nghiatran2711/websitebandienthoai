<?php
$sql = "select * from sanpham where idSanPham='$_GET[id]' ";
$row = mysqli_query($conn, $sql);
$dong = mysqli_fetch_array($row);
?>
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
           Sửa sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="modules/sanpham/xuly.php?id=<?php echo $dong['idSanPham'] ?>" method="post" enctype="multipart/form-data">
                    	<div class="form-group">
                            <label for="exampleInputEmail1">Mã sản phẩm</label>
                            <input type="text" readonly name="idSanPham" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['idSanPham'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="tenSanPham" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['tenSanPham'] ?>">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh</label>
                                <input type="file" id="exampleInputFile" name="hinhAnh">
                                <img src="modules/sanpham/uploads/<?php echo $dong['hinhAnh'] ?>" width="80" height="80">
                        </div>
                        <div class="form-group">
                            <?php
				                $sql_loaisp = "select * from loaisanpham";
				                $query_loaisp = mysqli_query($conn, $sql_loaisp);
				            ?>
                            <label for="inputSuccess">Loại sản phẩm</label>
                            <select class="form-control m-bot15" name="idLoaiSanPham">
                                <?php
		                            while ($dong_loaisp = mysqli_fetch_array($query_loaisp)) {
		                                if ($dong['idLoaiSanPham'] == $dong_loaisp['idLoaiSanPham']) {
		                        ?>
		                                    <option selected="selected" value="<?php echo $dong_loaisp['idLoaiSanPham'] ?>"><?php echo $dong_loaisp['tenLoaiSanPham'] ?></option>
		                        <?php
		                                } else {
		                        ?>
		                                    <option value="<?php echo $dong_loaisp['idLoaiSanPham'] ?>"><?php echo $dong_loaisp['tenLoaiSanPham'] ?></option>
		                        <?php
		                                }
		                            }
		                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                           <?php
				                $sql_nsx = "select * from nhasx";
				                $query_nsx = mysqli_query($conn, $sql_nsx);
				            ?>
                            <label for="inputSuccess">Hiệu sản phẩm</label>
                            <select class="form-control m-bot15" name="idNSX">
                                <?php
		                            while ($dong_nsx = mysqli_fetch_array($query_nsx)) {
		                                if ($dong['idNSX'] == $dong_nsx['idNSX']) {
		                        ?>
		                                    <option selected="selected" value="<?php echo $dong_nsx['idNSX'] ?>"><?php echo $dong_nsx['tenNSX'] ?></option>
		                        <?php
		                                } else {
		                        ?>
		                                   <option value="<?php echo $dong_nsx['idNSX'] ?>"><?php echo $dong_nsx['tenNSX'] ?></option>
		                        <?php
		                                }
		                            }
		                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="Gia" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['Gia'] ?>">
                        </div>
                    	<button type="submit" name="sua" class="btn btn-info">Sửa sản phẩm</button>
                    </form>
                </div>
            </div>
    </section>
</div>