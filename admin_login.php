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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบผู้ดูแลระบบ - ชิงหลงเซิฟ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-deep: #080203;
            --surface-card: #1f0b0e;
            --primary-red: #8b0000;
            --accent-gold: #d4af37;
            --text-light: #ffffff;
            --text-muted: #e6d58c;
            --border-gold: rgba(212, 175, 55, 0.4);
            --shadow-gold: 0 0 25px rgba(212, 175, 55, 0.25);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Prompt', sans-serif;
        }

        body {
            background-color: var(--bg-deep);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: radial-gradient(circle at 50% 0%, #1a0508 0%, var(--bg-deep) 70%);
            padding: 1rem;
        }

        .login-card {
            background: var(--surface-card);
            border: 2px solid var(--accent-gold);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 420px;
            box-shadow: var(--shadow-gold);
            text-align: center;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        h1 {
            color: var(--accent-gold);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 10px rgba(212, 175, 55, 0.4);
        }

        p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: var(--accent-gold);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            background: #000;
            border: 1px solid var(--border-gold);
            color: #fff;
            padding: 12px 14px;
            border-radius: 8px;
            outline: none;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #ffea79;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.4);
        }

        .gold-btn {
            background: linear-gradient(135deg, #ffea79, var(--accent-gold), #aa771c);
            color: #000;
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 0 12px rgba(212, 175, 55, 0.4);
            font-size: 0.95rem;
            margin-top: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .gold-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 20px var(--accent-gold);
            filter: brightness(1.1);
        }

        .back-btn {
            display: inline-block;
            margin-top: 1.5rem;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: 0.3s;
        }

        .back-btn:hover {
            color: var(--accent-gold);
            text-decoration: underline;
        }

        #error-msg {
            color: #ff4d4d;
            font-size: 0.85rem;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-icon">🛡️</div>
        <h1>ระบบควบคุมผู้ดูแลระบบ</h1>
        <p>ชิงหลงเซิฟ (Ching Long Server)</p>

        <!-- ฟอร์มนี้สามารถส่งค่าไปเช็คผ่านไฟล์ check_login.php หรือตรวจสอบด้วย Javascript ได้ตามโครงสร้างระบบของคุณ -->
        <form action="check_login.php" method="POST">
            <div class="form-group">
                <label>รหัสผ่านสำหรับ Admin:</label>
                <input type="password" name="password" id="admin-password" placeholder="กรอกรหัสผ่านแอดมิน..." required>
            </div>
            <div id="error-msg">❌ รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง</div>
            <button type="submit" class="gold-btn">🔐 เข้าสู่แดชบอร์ด</button>
        </form>

        <a href="index.html" class="back-btn">⬅️ ย้อนกลับสู่หน้าหลัก</a>
    </div>

</body>
</html>
