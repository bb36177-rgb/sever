<?php
session_start();
// ป้องกันการแอบเข้าโดยไม่ผ่านการล็อกอิน
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: admin_login.php");
    exit();
}

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
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f6f7; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 8px; margin: 8px 0 15px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 20px; background: #27ae60; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #219653; }
    </style>
</head>
<body>

    <!-- แถบเมนูด้านข้าง -->
    <div class="sidebar">
        <h2>🛠️ ระบบจัดการแอดมิน</h2>
        <hr style="border-color: #34495e; margin-bottom: 20px;">
        
        <a href="admin_dashboard.php?page=data" class="<?= ($page == 'data') ? 'active':'' ?>">📁 ข้อมูลที่บันทึกไว้ (ทั้งหมด)</a>
        <a href="admin_dashboard.php?page=calendar" class="<?= ($page == 'calendar') ? 'active':'' ?>">📅 แก้ไขปฏิทิน</a>
        <a href="admin_dashboard.php?page=topics" class="<?= ($page == 'topics') ? 'active':'' ?>">📝 แก้ไขหัวข้อหน้าเว็บ</a>
        <a href="admin_dashboard.php?page=stats" class="<?= ($page == 'stats') ? 'active':'' ?>">📊 หน้าสถิติ</a>
        
        <a href="admin_logout.php" class="logout">🚪 ออกจากระบบ</a>
    </div>

    <!-- ส่วนแสดงเนื้อหาตามเมนูที่เลือก -->
    <div class="content">
        <div class="card">
            <?php if ($page == 'data'): ?>
                <h2>📁 ข้อมูลที่บันทึกไว้ (เฉพาะ Admin เท่านั้นที่เห็นทั้งหมด)</h2>
                <p>แสดงรายชื่อผู้ทำแบบประเมินและข้อมูลทั้งหมดในระบบ:</p>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ผลการประเมิน</th>
                        <th>วันที่ทำรายการ</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>นายสมชาย ใจดี</td>
                        <td>ดีมาก (5/5)</td>
                        <td>2026-06-06</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>นางสาวสมหญิง รักเรียน</td>
                        <td>ปานกลาง (3/5)</td>
                        <td>2026-06-05</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>นายมานะ 101</td>
                        <td>ดี (4/5)</td>
                        <td>2026-06-04</td>
                    </tr>
                </table>

            <?php elseif ($page == 'calendar'): ?>
                <h2>📅 ระบบแก้ไขปฏิทิน (เฉพาะ Admin)</h2>
                <p>เพิ่มหรือแก้ไขกิจกรรมที่จะแสดงบนปฏิทินหน้าเว็บไซต์:</p>
                
                <form action="" method="POST">
                    <label>หัวข้อกิจกรรม:</label>
                    <input type="text" name="event_title" placeholder="เช่น ประชุมประจำเดือน" required>
                    
                    <label>วันที่จัดกิจกรรม:</label>
                    <input type="date" name="event_date" required>
                    
                    <label>รายละเอียด:</label>
                    <textarea name="event_desc" rows="4" placeholder="รายละเอียดกิจกรรม..."></textarea>
                    
                    <button type="submit" name="save_calendar">💾 บันทึกการเปลี่ยนแปลงปฏิทิน</button>
                </form>
                
                <?php
                if (isset($_POST['save_calendar'])) {
                    echo "<p style='color: green; margin-top: 15px;'><strong>[สำเร็จ]</strong> บันทึกข้อมูลปฏิทินเรียบร้อยแล้ว!</p>";
                }
                ?>

            <?php elseif ($page == 'topics'): ?>
                <h2>📝 แก้ไขหัวข้อหน้าแยก</h2>
                <p>ส่วนสำหรับปรับเปลี่ยนหัวข้อหลัก หรือข้อความในหน้าเว็บไซต์แต่ละหน้า...</p>

            <?php elseif ($page == 'stats'): ?>
                <h2>📊 หน้าสถิติการใช้งาน</h2>
                
                <h3 style="color: #2980b9; margin-top: 25px;">📈 สถิติการเข้าเว็บไซต์</h3>
                <ul>
                    <li>ผู้เข้าชมวันนี้: <strong>142 คน</strong></li>
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
