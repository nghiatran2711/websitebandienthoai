<?php
	@session_start();
	ini_set("display_errors","0");
?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập vào tài khoản của bạn</h2>
						<form action="" method="POST">
							<input type="email" name="email" placeholder="Nhập email" />
							<input type="password" name="matkhau" placeholder="Nhập mật khẩu" />
							<button type="submit" name="dangnhap" class="btn btn-default">Đăng nhập</button>
						</form>
						<?php
							if(isset($_POST["dangnhap"]))
							{
								$email= $_POST["email"];
								$matkhau =$_POST["matkhau"];
								//lam sach thong tin
								if ($email == "" || $matkhau =="")
								{
									echo 'Khong duoc de trong';
								}
								else
								{
									$sql = "select * from khachhang where Email = '$email' and matKhau = '$matkhau' ";
									$query = mysqli_query($conn,$sql);
									$num_rows = mysqli_num_rows($query);
									if ($num_rows==0) {
										echo 'Tên đăng nhập hoặc mật khẩu không đúng !';
									}
									else
									{
										//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
										$_SESSION['email'] = $email;
						                // Thực thi hành động sau khi lưu thông tin vào session
						                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
						                header('Location:index.php');
									}
								}
							}
						?>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký mới!</h2>
						<form action="" method="POST">
							<input type="text" name="hovaten" placeholder="Họ và tên"/>
							<input type="email" name="email" placeholder="Nhập email"/>
							<input type="password" name="matkhau" placeholder="Nhập mật khẩu"/>
							<input type="text" name="CMND" placeholder="Nhập số CMND"/>
							<input type="text" name="sdt"  placeholder="Nhập số điện thoại"/>
							<input type="text" name="diachi" placeholder="Nhập địa chỉ"/>
							<button type="submit" name="dangky" class="btn btn-default">Đăng ký</button>
						</form>
						<?php
								if (isset($_POST["dangky"])) {
						  			//lấy thông tin từ các form bằng phương thức POST
						  			$hoten = $_POST["hovaten"];
						  			$email= $_POST["email"];
						 			$matkhau = $_POST["matkhau"];
						  			$cmnd = $_POST["CMND"];
						  			$diachi = $_POST["diachi"];
						  			$sdt = $_POST["sdt"];
						  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
									  if ($hoten == "" || $email == "" || $matkhau == "" || $cmnd == "" || $diachi == "" || $sdt == "" ) {
										   echo "bạn vui lòng nhập đầy đủ thông tin";
						  			}else{
						  					// Kiểm tra tài khoản đã tồn tại chưa
						  					$sql="select * from khachhang where Email='$email'";
											$kt=mysqli_query($conn, $sql);

											if(mysqli_num_rows($kt)  > 0){
												 echo '<h4 style="color:red;">Tài khoản đã tồn tại !!!</h4>';
											}else{
												//thực hiện việc lưu trữ dữ liệu vào db
							    				$sql = "INSERT INTO khachhang(tenKhachHang,matKhau,CMND,diaChi,Email,SDT) VALUES ('$hoten','$matkhau','$cmnd','$diachi','$email','$sdt')";
											    // thực thi câu $sql với biến conn lấy từ file connection.php
						   						mysqli_query($conn,$sql);
										   		echo '<h4 style="color:green;">Đăng ký thành công ^-^ </h4>';
											}
															    
											
									  }
							}
	?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->	