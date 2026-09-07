<?php
session_start();

// กำหนดรหัสผ่านแอดมินตามที่คุณต้องการ
$correct_code = "bb-36177-banbung";

if (isset($_POST['admin_code'])) {
    if ($_POST['admin_code'] === $correct_code) {
        // ถ้ารหัสผ่านถูกต้อง ให้บันทึกสถานะ Session
        $_SESSION['is_admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // ถ้ารหัสผ่านผิด แจ้งเตือนแล้วเด้งกลับหน้าล็อกอิน
        echo "<script>alert('❌ รหัสผ่านไม่ถูกต้อง! กรุณาลองใหม่อีกครั้ง'); window.location.href='admin_login.php';</script>";
        exit();
    }
} else {
    // ถ้าเข้าไฟล์นี้โดยตรงโดยไม่ผ่านการกด 
    header("Location: admin_login.php");
    exit();
}
?>
