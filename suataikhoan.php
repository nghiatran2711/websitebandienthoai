<?php  
	$idtaikhoan=$_GET['id'];
      @session_start();
      $login_check = $_SESSION['email'];
      if ($login_check==false) {
        header('Location:?quanly=dangnhap');
      }
?>
<?php
	if (isset($_POST["sua"])) {
	$tenkhachhang = $_POST["tenkhachhang"];
	$cmnd= $_POST["cmnd"];
	$diachi = $_POST["diachi"];
	$email = $_POST["email"];
	$sdt = $_POST["sdt"];
		$sql_sua = "update khachhang set tenkhachhang='$tenkhachhang',CMND='$cmnd',diaChi='$diachi',Email='$email',SDT='$sdt' where idKhachHang='".$idtaikhoan."'";
		mysqli_query($conn,$sql_sua);
	header("Location:?quanly=taikhoan");
}
$sql="SELECT * FROM khachhang where idKhachHang='".$idtaikhoan."'";
    $row=mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($row);
 ?>
<div class="row">  	
	<div class="col-sm-6">
		<div class="contact-form">
			<h2 class="title text-center">Thông tin tài khoản</h2>
			<div class="status alert alert-success" style="display: none"></div>
			<form style="margin-left: 160px;" action="" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				<div class="form-group col-md-8">
					<label>Họ và tên</label>
					<input type="text" name="tenkhachhang" class="form-control" required="required" value="<?php echo $result['tenKhachHang']; ?>">
					<label>Số chứng minh nhân dân</label>
					<input type="text" name="cmnd" class="form-control" required="required" value="<?php echo $result['CMND']; ?>">
					<label>Địa chỉ</label>
					<input type="text" name="diachi" class="form-control" required="required" value="<?php echo $result['diaChi']; ?>">
					<label>Email</label>
					<input type="Email" name="email" class="form-control" required="required" value="<?php echo $result['Email']; ?>">
					<label>Số điện thoại</label>
					<input type="text" name="sdt" class="form-control" required="required" value="<?php echo $result['SDT']; ?>">
					<input type="submit" name="sua" class="btn btn-primary pull-right" value="Sửa thông tin">
				</div>
			</form>
		</div>
	</div>
</div>