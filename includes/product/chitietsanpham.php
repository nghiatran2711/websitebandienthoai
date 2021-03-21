<?php 
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['id'];
    }
 ?>
<?php
	$sql_chitietsp="SELECT sanpham.*,nhasx.tenNSX,loaisanpham.tenLoaiSanPham FROM sanpham 
	INNER JOIN nhasx ON sanpham.idNSX = nhasx.idNSX
	INNER JOIN loaisanpham ON sanpham.idLoaiSanPham = loaisanpham.idLoaiSanPham
			 WHERE sanpham.idSanPham = '".$id."'";
    $query_chitietsp= mysqli_query($conn, $sql_chitietsp);
	$dong_chitietsanpham=mysqli_fetch_array($query_chitietsp);
?>
<section>
		<div class="container">
			<div class="row">					
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Loại sản phẩm</h2>
						<?php
	                        $sql_loai="select * from loaisanpham order by idLoaiSanPham asc";
	                        $query_loai= mysqli_query($conn, $sql_loai);
                        ?>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php 
	                            while ($dong_loai= mysqli_fetch_array($query_loai)){
	                        ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="?quanly=loaisp&id=<?php echo $dong_loai['idLoaiSanPham'] ?>"><?php echo $dong_loai['tenLoaiSanPham']?></a></h4>
								</div>
							</div>
							<?php
	                            }
	                        ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Hiệu sản phẩm</h2>
							<div class="brands-name">
								<?php
		                            $sql_hieu="select * from nhasx order by idNSX asc";
		                        	$query_hieu= mysqli_query($conn, $sql_hieu);
		                        ?>
								<ul class="nav nav-pills nav-stacked">
									<?php 
			                            while ($dong_hieu= mysqli_fetch_array($query_hieu)){
			                        ?>
										<li><a href="?quanly=hieusp&id=<?php echo $dong_hieu['idNSX'] ?>"><?php echo $dong_hieu['tenNSX']?></a></li>
									<?php
			                            }
			                        ?>
								</ul>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="quantri/admin/modules/sanpham/uploads/<?php echo $dong_chitietsanpham['hinhAnh'] ?>" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $dong_chitietsanpham['tenSanPham'] ?></h2>
								<span>
									<h1 style="display: inline;float: left; margin-top: 7px; font-size: 25px">Giá sản phẩm : </h1><span> <?php echo number_format($dong_chitietsanpham['Gia']).' '.'VNÐ'?></span><br><br><br>
									<form action="?quanly=themgiohang" method="POST">
										<input type="hidden" name="idsanpham" value="<?php echo $dong_chitietsanpham['idSanPham']?>">
										<label>Số lượng:</label>
										<input type="text" value="1" name="soluong" />
										<button type="submit" name="themgiohang" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Thêm giỏ hàng
										</button>
									</form>
								</span>
								<p><b>Tên nhà sản xuất:</b> <?php echo $dong_chitietsanpham['tenNSX']?></p>	
								<p><b>Tên loại sản phẩm:</b><?php echo $dong_chitietsanpham['tenLoaiSanPham']?></p>	
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
				</div>
			</div>
		</div>
	</section>