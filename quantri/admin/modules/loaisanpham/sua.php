<?php
    $sql = "select * from loaisanpham where idLoaiSanPham = '$_GET[id]'";
    $row=mysqli_query($conn,$sql);
    $dong=mysqli_fetch_array($row);     
?>
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Loại sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="modules/loaisanpham/xuly.php?id=<?php echo $dong['idLoaiSanPham']?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã loại sản phẩm</label>
                            <input type="text" readonly name="idLoaiSanPham" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['idLoaiSanPham'] ?>">
                            <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                            <input type="text" name="tenLoaiSanPham" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['tenLoaiSanPham'] ?>">
                        </div>
                    	<button type="submit" name="sua" class="btn btn-info">Sửa loại sản phẩm</button>
                    </form>
                </div>
            </div>
    </section>
</div>