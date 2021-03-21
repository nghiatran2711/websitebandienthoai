<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Login Adminstrator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<?php
	session_start();
	include('admin/modules/connection.php');
?>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
		<form action="" method="post">
			<input type="email" class="ggg" name="email" placeholder="Nhập Email" required="">
			<input type="password" class="ggg" name="matkhau" placeholder="Nhập mật khẩu" required="">
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
		<?php 
            if(isset($_POST['login'])){
	            $email = $_POST['email'];
	            $matkhau = $_POST['matkhau'];
	            $sql="select * from nhanvien where Email='$email' and matKhau='$matkhau' limit 1 ";
	            $row=mysqli_query($conn,$sql);
	            $sql_it = mysqli_fetch_array($row);
	            $level = $sql_it['idQuyen'];
	            $count=mysqli_num_rows($row);
	            if($count>0){
	                if($level == '1'){
	                    $_SESSION['dangnhap1']=$email;
	                    if (isset($_SESSION['dangnhap1'])){
	                        header('location:admin/index.php');
	                    }else{
	                        header('location:login.php');
	                    }   
	                }elseif($level == '2'){
	                    $_SESSION['dangnhap2']=$email;
	                    if (isset($_SESSION['dangnhap2'])){
	                        header('location:kho/index.php');
	                    }else{
	                        header('location:login.php');
	                    }   
	                }elseif($level == '3'){
	                    $_SESSION['dangnhap3']=$email;
	                    if (isset($_SESSION['dangnhap3'])){
	                         header('location:nhanviengiaohang/index.php');
	                    }else{
	                        header('location:login.php');
	                    } 
	                }
	            }else{ 
	                echo 'Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại.';
	            }
            }
        ?>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
