<?php
  session_start();
  include("header.php");
  include("db_connect.php");

?>  
<div class="container"><!-- container-fluid ขยายเต็มหน้าจอ -->
<?php
    if(isset($_POST["login"])) {
            // new mysqli("[host]", "[username]", "[password]") or die("Cannot connect database.");    
        $username = $_POST["username"];
        $password = $_POST["password"];

        //--- check user status
        $sql = "select * from user 
        where username='$username' 
        and password='$password' 
        ";

        //echo $sql;
        $result = $mysqli->query($sql);
        $obj = $result->fetch_object();

        if($obj) $status = $obj->status;
        else $status = null;

        //---------------------------------

        $sql = "select * from user 
        where username='$username' 
        and password='$password' 
        and status='1'
        ";
        //echo $sql;
        $result = $mysqli->query($sql);
        //echo "num row: ".$result->num_rows."<br>";
        if($result->num_rows > 0) {
            $obj = $result->fetch_object();
            
            $_SESSION["user_id"] = $obj->user_id;
            $_SESSION["username"] = $obj->username;
            $_SESSION["user_fullname"] = $obj->user_fullname;
            $_SESSION["user_type"] = $obj->user_type;
            $_SESSION["login"] = true;

            if($obj->user_type=="ADMIN") {
                $_SESSION["admin"] = true;
                echo "<meta http-equiv='refresh' content='2;url=admin/index.php'>";
            } else if($obj->user_type=="RESTAU_ADMIN") {
                echo "<meta http-equiv='refresh' content='2;url=restau_admin/index.php'>";
            } else if($obj->user_type=="RIDER") {
                echo "<meta http-equiv='refresh' content='2;url=rider/index.php'>";
            } else if($obj->user_type=="CUSTOMER") {
                echo "<meta http-equiv='refresh' content='2;url=customer/index.php'>";
			} else {
                echo "<div class='alert alert-success'>การยืนยันตัวตนถูกต้อง</div>";
                echo "<meta http-equiv='refresh' content='2;url=index.php'>";
            }
            exit();
        } else {
            if($status==0) {
                echo "<div class='alert alert-danger'>ชื่อผู้ใช้นี้ยังไม่ได้รับการอนุมัติ</div>";
            } else if($status==2) {
                echo "<div class='alert alert-danger'>ชื่อผู้ใช้นี้ถูกยกเลิก</div>";
            } else {
                echo "<div class='alert alert-danger'>การยืนยันตัวตนไม่ถูกต้อง</div>";
            }
        }
    }
?>
    <div class="row">
        <div class="col-sm-12">
        <!-- Start content -->
        <h1>ยืนยันตัวตนเข้าสู่ระบบ</h1> 

        <form method="post">
        <p> 
            <label>ชื่อผู้ใช้</label>
            <input type="text" name="username" class="form-control">
        </p>
        <p>  
            <label>รหัสผ่าน</label>
            <input type="password" name="password" class="form-control">
        </p>   
        <p>
            <button type="submit" name="login" class="btn btn-primary">เข้าสู่ระบบ</button>
        </p>              
        </form>
        <!-- End content -->
        </div>
    </div>
</div>  
<?php
  include("footer.php");
?>