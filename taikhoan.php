<?php 
      @session_start();
      $login_check = $_SESSION['email'];
      if ($login_check==false) {
        header('Location:?quanly=dangnhap');
      }
?>
<?php
    $sql="SELECT * FROM khachhang";
   	$row=mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($row);
?>
<div class="contact-info" align="center">
	    				<h2 class="title text-center">Thông tin tài khoản</h2>
	    				<address>
	    					<p>Họ và tên: <?php echo $result['tenKhachHang']; ?></p>
							<p>Chứng minh nhân dân: <?php echo $result['CMND']; ?></p>
							<p>Địa chỉ: <?php echo $result['diaChi']; ?></p>
							<p>Email: <?php echo $result['Email']; ?></p>
							<p>SĐT: <?php echo $result['SDT']; ?></p>
							<p><a class="btn btn-info" href="?quanly=suataikhoan&id=<?php echo $result['idKhachHang']?>">Cập nhật thông tin</a></p>
	    				</address>
	    			</div>