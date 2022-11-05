<?php
  session_start();
  include("header.php");
  include("db_connect.php");

?>  
<div class="container">
	<div class="d-grid gap-2 col-6 mx-auto">
			<a href="register_customer.php" class="btn btn-success">ลงทะเบียนผู้ใช้</a>
			<a href="register_restau_admin.php" class="btn btn-success">ลงทะเบียนผู้ดูแลร้านอาหาร</a>
			<a href="register_rider.php" class="btn btn-success">ลงทะเบียนผู้ส่งอาหาร</a>
	</div>
</div>
<?php
  include("footer.php");
?>