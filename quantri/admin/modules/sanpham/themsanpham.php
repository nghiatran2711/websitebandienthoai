<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="modules/sanpham/xuly.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="tenSanPham" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh</label>
                                <input type="file" id="exampleInputFile" name="hinhAnh">
                        </div>
                        <div class="form-group">
                            <?php
                                $sql = "select * from loaisanpham";
                                $run = mysqli_query($conn, $sql);
                            ?>
                            <label for="inputSuccess">Loại sản phẩm</label>
                            <select class="form-control m-bot15" name="idLoaiSanPham">
                                <?php
                                    while ($dong = mysqli_fetch_array($run)) {
                                ?>
                                    <option value="<?php echo $dong['idLoaiSanPham'] ?>"><?php echo $dong['tenLoaiSanPham'] ?></option>
                                <?php
                                    }
                                ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <?php
                                $sql = "select * from nhasx";
                                $run = mysqli_query($conn, $sql);
                            ?>
                            <label for="inputSuccess">Hiệu sản phẩm</label>
                            <select class="form-control m-bot15" name="idNSX">
                                <?php
                                    while ($dong = mysqli_fetch_array($run)) {
                                ?>
                                        <option value="<?php echo $dong['idNSX'] ?>"><?php echo $dong['tenNSX'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="Gia" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại">
                        </div>
                    	<button type="submit" name="them" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
    </section>
</div>