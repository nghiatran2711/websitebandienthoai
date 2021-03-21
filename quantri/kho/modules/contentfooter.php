<!--main content start-->
<section id="main-content">
	<section class="wrapper">
<?php
    if (isset($_GET['quanly']) && $_GET['ac']) {
        $tam = $_GET['quanly'];
        $tam1 = $_GET['ac'];
    } else {
        $tam = '';
    }if (($tam == 'donhang') && ($tam1 == 'lietke')) {
         include('modules/donhang/donhang.php');
    }elseif (($tam == 'chitietdonhang') && ($tam1 == 'lietke')) {

        include('modules/donhang/chitietdonhang.php');
    }elseif (($tam == 'tinhtrang') && ($tam1 == 'xuly')) {

        include('modules/donhang/capnhattinhtrang.php');
    }elseif (($tam == 'themnhaphang') && ($tam1 == 'them')) {

        include('modules/nhaphang/themnhaphang.php');
    }elseif (($tam == 'nhaphang') && ($tam1 == 'lietke')) {

        include('modules/nhaphang/nhaphang.php');
    }elseif (($tam == 'nhaphang') && ($tam1 == 'nhap')) {

        include('modules/nhaphang/xulynhaphang.php');
    }elseif (($tam == 'xoaphieunhap') && ($tam1 == 'xoa')) {

        include('modules/nhaphang/xoaphieunhap.php');
    }elseif (($tam == 'timkiem') && ($tam1 == 'search')) {

        include('modules/timkiem/timkiem.php');
    }else {
        include('modules/donhang/donhang.php');
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