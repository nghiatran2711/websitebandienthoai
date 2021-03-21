<?php
	@session_start();
	ini_set("display_errors","0");
?>
<?php //Cập nhật lại số lượng khi nhập vào số lượng mới
	if(isset($_POST['update_nhaphang']))
	    {
	        foreach($_POST['soluong'] as $idsanpham => $prd)//là giá trị nhập vào. Mỗi id tượng ứng với số lượng nhập vào prd 
	            {
	                if(($prd == 0) and (is_numeric($prd)))//Nếu nhập vào 0 thì xóa sản phẩm đó đi
	                {
	                    unset($_SESSION['nhaphang'][$idsanpham]);
	                }
	                elseif(($prd > 0) and (is_numeric($prd)))//Nhập vào số lượng >0 thì cập nhật số lượng bằng với số lượng vừa nhập vào
	                {
	                    $_SESSION['nhaphang'][$idsanpham] = $prd;
	                }
	            }
	    }
?>
<?php 
	$sql_nhanvien="select * from nhanvien where Email = '".$_SESSION['dangnhap2']."'";
	$query_nhanvien=mysqli_query($conn,$sql_nhanvien);
	$row=mysqli_fetch_array($query_nhanvien);
?>
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Nhập hàng
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="?quanly=themnhaphang&ac=them" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" readonly class="form-control" id="exampleInputEmail1" value="<?php echo $row['tenNhanVien']; ?>">
                        </div>
                        <div class="form-group">
                            <?php
                                $sql_sanpham = "select * from sanpham";
                                $query_sanpham = mysqli_query($conn, $sql_sanpham);
                            ?>
                            <label for="inputSuccess">Tên sản phẩm</label>
                            <select class="form-control m-bot15" name="idsanpham">
                                <?php
									while($dong_sp = mysqli_fetch_array($query_sanpham))
									{
								?>
								    <option value="<?php echo $dong_sp['idSanPham'] ?>"><?php echo $dong_sp['tenSanPham'] ?></option>
								<?php 
						      		}
						      	?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" name="soluong" class="form-control" id="exampleInputEmail1">
                        </div>
                    	<button type="submit" name="nhaphang" class="btn btn-info">Thêm nhập hàng</button>
                    </form>
                </div>
            </div>
	</section>
	<div class="table-agile-info">
	  	<div class="panel panel-default">
		    <div class="panel-heading">
		      Chi tiết nhập hàng
		    </div>
		</div>
		<form action="" method="post">
		<div class="table-responsive">
		      	<table class="table table-striped b-t b-light">
			        <thead>
			          <tr>
			            <th>Mã nhân viên</th>
			            <th>Mã sản phẩm</th>
			            <th>Số lượng</th>
			            <th style="width:100px;">Thao tác</th>
			          </tr>
			        </thead>
			        <?php
						if($_SESSION['nhaphang'] != NULL)
						{
							foreach($_SESSION['nhaphang'] as $idsanpham =>$prd)// lặp toàn bộ id sản phẩm lưu trong session
							{
								$arr_id[] = $idsanpham;
							}
							$str_id = implode(',',$arr_id);// Chuyển mảng id sản phẩm sang dạng chuỗi bằng hàm implode()
							$sql_sanpham = "select * from  sanpham where idSanPham in ($str_id) order by idSanPham asc";
							$query_sanpham = mysqli_query($conn,$sql_sanpham) or die ('Cannot select table!');
							while ($rows = mysqli_fetch_array($query_sanpham))
							{
					?>	
			        <tbody>
			          <tr>
			            <td><span class="text-ellipsis"><?php echo $row['idNhanVien']; ?></span></td>
			            <td><span class="text-ellipsis"><?php echo $rows['idSanPham']; ?></span></td>
			            <td><input type="text" name="soluong[<?php echo $rows['idSanPham']; ?>]" value="<?php echo $_SESSION['nhaphang'][$rows['idSanPham']]; ?>"></td>
			            <td><span class="text-ellipsis"><?php echo $dong['Gia'] ?></span></td>
			            <td>
			              <input class="btn btn-info btn-sm" type="submit" name="update_nhaphang" value="Sửa">
			              <a href="?quanly=xoaphieunhap&ac=xoa&id=<?php echo $rows['idSanPham']; ?>" class="active" ui-toggle-class=""> <i class="fa fa-trash-o"></i></a>
			            </td>
			          </tr>
			        </tbody>
			        <?php
			    		}
			        }
			        ?>
		      </table>
		</div>
		<div align="center">
			<input type="submit" name="btnhaphang" formaction="index.php?quanly=nhaphang&ac=nhap" value="Nhập hàng" class="btn btn-info">
		</div>
	</form>
	</div>
</div>
