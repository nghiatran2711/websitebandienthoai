	<?php
				if(isset($_GET['quanly'])&&($_GET['quanly'])!=''){
					$tam= $_GET['quanly'];
				}else{
					$tam ='';
				}if($tam == 'hieusp'){
					include('includes/product/hieusanpham.php');
				}elseif($tam == 'loaisp'){
					include('includes/product/loaisanpham.php');
                }elseif($tam == 'giohang'){
					include('includes/product/giohang.php');
                }elseif($tam == 'xemdonhang'){
					include('includes/product/xemdonhang.php');
                }elseif($tam == 'chitietdonhang'){
					include('includes/product/chitietdonhang.php');
                }elseif($tam == 'dangky'){
					include('dangky.php');
                }elseif($tam == 'dangnhap'){
					include('dangnhap.php');
                }elseif($tam == 'xulydangnhap'){
					include('xulydangnhap.php');
                }elseif($tam == 'dangxuat'){
					include('dangxuat.php');
                }elseif($tam == 'taikhoan'){
					include('taikhoan.php');
                }elseif($tam == 'suataikhoan'){
					include('suataikhoan.php');
                }elseif($tam == 'timkiem'){
					include('includes/product/timkiem.php');
                }elseif($tam == 'themgiohang'){
					include('includes/product/themgiohang.php');
                }elseif($tam == 'xoagiohang'){
					include('includes/product/xoagiohang.php');
                }elseif($tam == 'huydonhang'){
					include('includes/product/huydonhang.php');
                }elseif($tam == 'details'){
					include('includes/product/chitietsanpham.php');
                }elseif($tam == 'phuongthucdathang'){
					include('includes/product/phuongthucdathang.php');
                }elseif($tam == 'chondathang'){
					include('includes/product/chitietdat.php');
                }elseif($tam == 'chitietgiohang'){
					include('includes/product/chitietdathang.php');
                }elseif($tam == 'nguoinhankhac'){
					include('includes/product/nguoinhankhac.php');
                }elseif($tam == 'dathang'){
					include('includes/product/dathang.php');
                }else{
					include('includes/product/sanpham.php');
				}
?>