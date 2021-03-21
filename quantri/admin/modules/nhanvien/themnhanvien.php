<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm nhân viên
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="modules/nhanvien/xuly.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" name="tennhanvien" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên nhân viên">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputFile">Số chứng minh nhân dân</label>
                                 <input type="text" name="cmnd" class="form-control" id="exampleInputEmail1" placeholder="Nhập số chứng minh nhân dân">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="Email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" name="matkhau" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại">
                        </div>
                        <div class="form-group">
                            <?php
				                $sql = "select * from quyen";
				                $run = mysqli_query($conn, $sql);
				            ?>
                            <label for="inputSuccess">Quyền</label>
                            <select class="form-control m-bot15" name="idQuyen">
                                <?php
		                            while ($dong = mysqli_fetch_array($run)) {
		                        ?>
		                                <option value="<?php echo $dong['idQuyen'] ?>"><?php echo $dong['tenQuyen'] ?></option>
		                        <?php
		                            }
		                        ?>
                            </select>
                        </div>
                    	<button type="submit" name="them" class="btn btn-info">Thêm nhân viên</button>
                    </form>
                </div>
            </div>
    </section>
</div>