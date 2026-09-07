<?php
session_start();
// ถ้าระบบจำสถานะแอดมินอยู่แล้ว ให้ข้ามไปหน้า Dashboard ทันที
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
    header("Location: admin_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f7; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 320px; text-align: center; }
        .login-card h2 { margin-bottom: 20px; color: #333; }
        input[type="password"] { width: 100%; padding: 12px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; }
        button { width: 100%; padding: 12px; background: #2c3e50; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #34495e; }
        .back-link { display: block; margin-top: 15px; color: #7f8c8d; text-decoration: none; font-size: 14px; }
        .back-link:hover { color: #333; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>🔒 Admin Login</h2>
        <form action="check_login.php" method="POST">
            <input type="password" name="admin_code" placeholder="กรอกรหัสผ่าน Admin" required autofocus>
            <button type="submit">เข้าสู่ระบบ</button>
        </form>
        <a href="index.php" class="back-link">← กลับสู่หน้าเว็บไซต์หลัก</a>
    </div>

</body>
</html>
