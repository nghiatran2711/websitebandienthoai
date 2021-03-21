<?php
	$sql_sanphamloai="SELECT * FROM sanpham WHERE idLoaiSanPham= '$_GET[id]' ";
	$row_sanphamloai= mysqli_query($conn, $sql_sanphamloai);
?>
<section>
		<div class="container">
			<div class="row">
			<div class="slider" id="main-slider"><!-- outermost container element -->
				<div class="slider-wrapper"><!-- innermost wrapper element -->
					<img src="images/images1.jpg" alt="First" class="slide" /><!-- slides -->
					<img src="images/images2.jpg" alt="Second" class="slide" />
					<img src="images/images3.jpg" alt="Third" class="slide" />
				</div>
			</div>					
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
					<div class="features_items"><!--features_items-->
						<?php
							$sql_loaisp="SELECT * FROM loaisanpham WHERE idLoaiSanPham= '$_GET[id]' ";
							$row_loaisp= mysqli_query($conn, $sql_loaisp);
							$dongloaisp=mysqli_fetch_array($row_loaisp);
						?>
						<h2 class="title text-center"><?php echo $dongloaisp['tenLoaiSanPham']; ?></h2>
						<?php
							while($dong_sanphamloai=mysqli_fetch_array($row_sanphamloai)){
						?>
			                <div class="col-sm-4">
			                    <div class="product-image-wrapper">
			                        <div class="single-products">
			                            <div class="productinfo text-center">
			                            	<a href="?quanly=details&id=<?php echo $dong_sanphamloai['idSanPham']?>">
			                                	<img src="quantri/admin/modules/sanpham/uploads/<?php echo $dong_sanphamloai['hinhAnh'] ?>" width="264px" height="264px" alt="" />
			                                </a>
			                                <h2><?php echo number_format($dong_sanphamloai['Gia']).' '.'VNÐ'?></h2>
			                                <p><?php echo $dong_sanphamloai['tenSanPham'] ?></p>
			                                <form action="?quanly=themgiohang" method="POST">
												<input type="hidden" name="idsanpham" value="<?php echo $dong_sanphamloai['idSanPham']?>">
												<input type="hidden" name="soluong" value="1">
												<button class="btn btn-default add-to-cart" type="submit" name="themgiohang"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
											</form>
			                        	</div>
			                        </div>
			                    </div>
			                </div>
			            <?php
							}
						?>
					</div><!--features_items-->	
				</div>
			</div>
		</div>
	</section>