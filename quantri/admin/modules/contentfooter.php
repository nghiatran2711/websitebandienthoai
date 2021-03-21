<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<?php

if (isset($_GET['quanly']) && $_GET['ac']) {
    $tam = $_GET['quanly'];
    $tam1 = $_GET['ac'];
} else {
    $tam = '';
}if (($tam == 'loaisp') && ($tam1 == 'them')) {
    include('modules/loaisanpham/themloai.php');
} elseif (($tam == 'loaisp') && ($tam1 == 'lietke')) {

    include('modules/loaisanpham/lietke.php');
} elseif (($tam == 'loaisp') && ($tam1 == 'sua')) {

    include('modules/loaisanpham/sua.php');
} elseif (($tam == 'hieusp') && ($tam1 == 'them')) {

    include('modules/hieusanpham/themhieu.php');
} elseif (($tam == 'hieusp') && ($tam1 == 'lietke')) {

    include('modules/hieusanpham/lietke.php');
} elseif (($tam == 'hieusp') && ($tam1 == 'sua')) {

    include('modules/hieusanpham/sua.php');
} elseif (($tam == 'sanpham') && ($tam1 == 'them')) {

    include('modules/sanpham/themsanpham.php');
} elseif (($tam == 'sanpham') && ($tam1 == 'lietke')) {

    include('modules/sanpham/lietke.php');
} elseif (($tam == 'sanpham') && ($tam1 == 'sua')) {

    include('modules/sanpham/sua.php');
} elseif (($tam == 'nhanvien') && ($tam1 == 'them')) {

    include('modules/nhanvien/themnhanvien.php');
}elseif (($tam == 'nhanvien') && ($tam1 == 'lietke')) {

    include('modules/nhanvien/lietke.php');
}elseif (($tam == 'nhanvien') && ($tam1 == 'sua')) {

    include('modules/nhanvien/sua.php');
} elseif (($tam == 'donhang') && ($tam1 == 'lietke')) {

    include('modules/donhang/donhang.php');
}elseif (($tam == 'chitietdonhang') && ($tam1 == 'lietke')) {

    include('modules/donhang/chitietdonhang.php');
}elseif (($tam == 'diachikhac') && ($tam1 == 'lietke')) {

    include('modules/quanlydonhang/diachikhac.php');
}elseif (($tam == 'nvgh') && ($tam1 == 'capnhat')) {
    
    include('modules/donhang/capnhatnvgh.php');
} elseif (($tam == 'timkiem') && ($tam1 == 'search')) {

    include('modules/timkiem/timkiem.php');
}else {
    include('modules/sanpham/lietke.php');
}
?>



    </section>
    <!-- footer -->
	<div class="footer">
		<div class="wthree-copyright">
		   <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
  	<!-- / footer -->
</section>