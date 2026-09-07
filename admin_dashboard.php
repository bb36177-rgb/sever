<?php
session_start();
// ป้องกันการแอบเข้าโดยไม่ผ่านการล็อกอิน
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// ตรวจสอบหน้าปัจจุบันจาก URL (ถ้าไม่มีกำหนดให้ค่าเริ่มต้นเป็น data)
$page = isset($_GET['page']) ? $_GET['page'] : 'data';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - หลังบ้าน</title>
    <style>
        body { display: flex; margin: 0; font-family: sans-serif; background: #ecf0f1; }
        .sidebar { width: 260px; background: #2c3e50; color: white; height: 100vh; padding: 20px; box-sizing: border-box; position: fixed; }
        .sidebar h2 { font-size: 18px; text-align: center; margin-bottom: 25px; color: #ecf0f1; }
        .sidebar a { display: block; color: #bdc3c7; padding: 12px 15px; text-decoration: none; border-radius: 4px; margin-bottom: 8px; font-size: 15px; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: #fff; }
        .sidebar .logout { background: #c0392b; color: white; margin-top: 40px; text-align: center; }
        .sidebar .logout:hover { background: #e74c3c; }
        
        .content { margin-left: 260px; padding: 40px; width: calc(100% - 260px); box-sizing: border-box; }
        .card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); min-height: 80vh; }
        .card h2 { margin-top: 0; color: #2c3e50; border-bottom: 2px solid #ecf0f1; padding-bottom: 15px; }
    </style>
</head>
<body>

    <!-- แถบเมนูด้านข้าง -->
    <div class="sidebar">
        <h2>🛠️ ระบบจัดการแอดมิน</h2>
        <hr style="border-color: #34495e; margin-bottom: 20px;">
        
        <a href="admin_dashboard.php?page=data" class="<?= ($page == 'data') ? 'active':'' ?>">📁 ข้อมูลที่บันทึกไว้</a>
        <a href="admin_dashboard.php?page=calendar" class="<?= ($page == 'calendar') ? 'active':'' ?>">📅 แก้ไขปฏิทิน</a>
        <a href="admin_dashboard.php?page=topics" class="<?= ($page == 'topics') ? 'active':'' ?>">📝 แก้ไขหัวข้อหน้าเว็บ</a>
        <a href="admin_dashboard.php?page=stats" class="<?= ($page == 'stats') ? 'active':'' ?>">📊 หน้าสถิติ</a>
        
        <a href="admin_logout.php" class="logout">🚪 ออกจากระบบ</a>
    </div>

    <!-- ส่วนแสดงเนื้อหาตามเมนูที่เลือก -->
    <div class="content">
        <div class="card">
            <?php if ($page == 'data'): ?>
                <h2>📁 ข้อมูลที่บันทึกไว้</h2>
                <p>ส่วนสำหรับเรียกดูและจัดการข้อมูลดิบ หรือฐานข้อมูลที่ผู้ใช้งานบันทึกเข้ามาในระบบ...</p>

            <?php elseif ($page == 'calendar'): ?>
                <h2>📅 แก้ไขปฏิทิน</h2>
                <p>ส่วนสำหรับเพิ่ม, แก้ไข หรือลบวันนัดหมายและตารางกิจกรรมบนปฏิทินของเว็บไซต์...</p>

            <?php elseif ($page == 'topics'): ?>
                <h2>📝 แก้ไขหัวข้อหน้าแยก</h2>
                <p>ส่วนสำหรับปรับเปลี่ยนหัวข้อหลัก ข้อความ หรือเนื้อหาย่อยในหน้าเว็บไซต์แต่ละหน้า...</p>

            <?php elseif ($page == 'stats'): ?>
                <h2>📊 หน้าสถิติการใช้งาน</h2>
                
                <h3 style="color: #2980b9; margin-top: 25px;">📈 สถิติการเข้าเว็บไซต์</h3>
                <ul>
                    <li>ผู้เข้าชมวันนี้: <strong>142 คน</strong></li>
                    <li>ผู้เข้าชมเดือนนี้: <strong>3,890 คน</strong></li>
                    <li>ผู้เข้าชมทั้งหมด: <strong>12,450 คน</strong></li>
                </ul>

                <h3 style="color: #27ae60; margin-top: 25px;">📋 สถิติคนทำแบบประเมิน</h3>
                <ul>
                    <li>จำนวนผู้ทำแบบประเมินทั้งหมด: <strong>520 คน</strong></li>
                    <li>คะแนนเฉลี่ยความพึงพอใจ: <strong>4.75 / 5.00</strong></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
