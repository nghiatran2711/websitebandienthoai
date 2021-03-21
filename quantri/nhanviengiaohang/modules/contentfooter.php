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
}elseif (($tam == 'tinhtrang1') && ($tam1 == 'xuly')) {
    
    include('modules/donhang/xuly1.php');
}elseif (($tam == 'tinhtrang2') && ($tam1 == 'xuly')) {
    
    include('modules/donhang/xuly2.php');
}elseif (($tam == 'dangxuat') && ($tam1 == 'dx')) {
    
    include('modules/donhang/dangxuat.php');
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