<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION["login"])==false) {
        echo "<meta http-equiv='refresh' content='2;url=../login.php'>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:#eeeeee">

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Food Delivery - Restaurant Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
	  <ul class="navbar-nav me-auto">
	  </ul>
	  <ul class="navbar-nav">

		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-bs-toggle="dropdown">
			<?php echo $_SESSION["username"]; ?>
		  </a>
		  <ul class="dropdown-menu  dropdown-menu-end">
			<li><a class="dropdown-item" href="edit_profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
			<li><a class="dropdown-item" href="change_password.php">เปลี่ยนรหัสผ่าน</a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
		  </ul>
		</li>
	  </ul>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-sm bg-light">

  <div class="container-fluid">
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="user_list.php" class="nav-link">จัดการผู้ใช้</a>
      </li>
      <li class="nav-item">
        <a href="restau_type.php" class="nav-link">จัดการประเภทร้านอาหาร</a>
      </li>
      <li class="nav-item">
        <a href="restaurant.php" class="nav-link">จัดการร้านอาหาร</a>
      </li>
      <li class="nav-item">
        <a href="report.php" class="nav-link">รายงาน</a>
      </li>
    </ul>
  </div>
</nav>
<br>
