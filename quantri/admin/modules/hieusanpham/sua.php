<?php
    $sql = "select * from nhasx where idNSX = '$_GET[id]'";
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
                    <form role="form" action="modules/hieusanpham/xuly.php?id=<?php echo $dong['idNSX']?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã hiệu sản phẩm</label>
                            <input type="text" readonly name="idNSX" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['idNSX'] ?>">
                            <label for="exampleInputEmail1">Tên hiệu sản phẩm</label>
                            <input type="text" name="tenNSX" class="form-control" id="exampleInputEmail1" value="<?php echo $dong['tenNSX'] ?>">
                        </div>
                    	<button type="submit" name="sua" class="btn btn-info">Sửa hiệu sản phẩm</button>
                    </form>
                </div>
            </div>
    </section>
</div>