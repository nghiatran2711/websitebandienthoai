<?php
$sql = "select * from nhanvien where idNhanVien='$_GET[id]' ";
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
                    <form role="form" action="modules/nhanvien/xuly.php?id=<?php echo $dong['idNhanVien'] ?>" method="post" enctype="multipart/form-data">
                    	<div class="form-group">
                            <label for="exampleInputEmail1">Mã nhân viên</label>
                            <input type="text" readonly name="idNhanVien" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['idNhanVien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" name="tennhanvien" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['tenNhanVien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số chứng minh nhân dân</label>
                            <input type="text" name="cmnd" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['CMND'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['SDT'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['Email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="text" name="matkhau" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['matKhau'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['diaChi'] ?>">
                        </div>
                        <div class="form-group">
                                    <?php
						                $sql_quyen = "select * from quyen";
						                $query_quyen = mysqli_query($conn, $sql_quyen);
					                ?>
                            <label for="inputSuccess">Quyền</label>
                            <select class="form-control m-bot15" name="idQuyen">
                               <?php
		                            while ($dong_quyen = mysqli_fetch_array($query_quyen)) {
		                                if ($dong['idQuyen'] == $dong_quyen['idQuyen']) {
		                        ?>
		                                    <option selected="selected" value="<?php echo $dong_quyen['idQuyen'] ?>"><?php echo $dong_quyen['tenQuyen'] ?></option>
		                        <?php
		                                } else {
		                        ?>
		                                    <option value="<?php echo $dong_quyen['idQuyen'] ?>"><?php echo $dong_quyen['tenQuyen'] ?></option>
		                        <?php
		                                }
		                            }
		                        ?>
                            </select>
                        </div>
                    	<button type="submit" name="sua" class="btn btn-info">Sửa sản phẩm</button>
                    </form>
                </div>
            </div>
    </section>
</div>