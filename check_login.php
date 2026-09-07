<?php
session_start();

// กำหนดรหัสผ่าน Admin ตามที่คุณต้องการ
$secret_code = "bb-36177-banbung";

if (isset($_POST['admin_code'])) {
    if ($_POST['admin_code'] === $secret_code) {
        $_SESSION['is_admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('รหัสผ่านไม่ถูกต้อง! กรุณาลองใหม่อีกครั้ง'); window.location='admin_login.php';</script>";
        exit();
    }
} else {
    header("Location: admin_login.php");
    exit();
}
?>
