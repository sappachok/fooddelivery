<?php
  session_start();
  include("header.php");
  include("db_connect.php");

?>  
<div class="container">
		<p><a href="index.php" class="btn btn-secondary">กลับไป</a></p>
		<h2>ลงทะเบียนผู้ใช้ทั่วไป</h2>
		<hr>
<?php
		if(isset($_POST["save"])) {

			$user_fullname = $_POST["user_fullname"];
			$user_address = $_POST["user_address"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$email = $_POST["email"];
			$tel = $_POST["tel"];
			$user_type = $_POST["user_type"];
			$status = $_POST["status"];

			$sql = "insert into user (user_fullname, user_address, username, password, email, tel, user_type, status)
				value ('$user_fullname', '$user_address', '$username', '$password', '$email', '$tel', '$user_type', '$status');
				";
			//echo $sql;

			$result = $mysqli->query($sql);        

			if($result) {
				echo "<div class='alert alert-success'>ลงทะเบียนเสร็จสิ้น</div>";
				echo "<div class='text-center'><a href='login.php' class='btn btn-primary'>เข้าสู่ระบบ</a></a>";
			} else {
				echo "<div class='alert alert-danger'>ไม่สามารถลงทะเบียนได้</div>";
				echo "<div>$sql</div>";
			}
			exit();
		} 
?>
		<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="user_type" value="CUSTOMER">
		<input type="hidden" name="status" value="1">
            <p>
				<label>ชื่อ - สกุล</label>
				<input type="text" name="user_fullname" class="form-control">
			</p>
            <p>
				<label>ที่อยู่</label>
				<textarea name="user_address" class="form-control"></textarea>
			</p>
            <p>
				<label>อีเมล</label>
				<input type="text" name="email" class="form-control">
			</p>
            <p>
				<label>เบอร์โทรศัพท์</label>
				<input type="text" name="tel" class="form-control">
			</p>
            <p>
				<label>ชื่อผู้ใช้</label>
				<input type="text" name="username" class="form-control">
			</p>            
            <p>
				<label>รหัสผ่าน</label>
				<input type="password" name="password" class="form-control">
			</p>            
			<p class="text-right">
				<button type="submit" name="save" class="btn btn-primary">ลงทะเบียน</button>
			</p>
		</form>
</div>
<?php
  include("footer.php");
?>