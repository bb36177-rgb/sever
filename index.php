<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>หน้าแรกเว็บไซต์</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background: #f9f9f9; }
        .top-admin-bar { background: #222; color: #fff; padding: 12px 30px; text-align: right; }
        .top-admin-bar a { color: #f39c12; text-decoration: none; font-weight: bold; font-size: 15px; }
        .main-content { padding: 40px; max-width: 800px; margin: auto; background: white; margin-top: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <!-- แถบปุ่มเข้าสู่ระบบ Admin ด้านบน -->
    <div class="top-admin-bar">
        <a href="admin_login.php">⚙️ เข้าสู่ระบบ Admin</a>
    </div>

    <div class="main-content">
        <h1>ยินดีต้อนรับสู่เว็บไซต์ของเรา</h1>
        <p>นี่คือเนื้อหาหน้าเว็บไซต์หลักสำหรับผู้ใช้งานทั่วไป...</p>
        
        <hr style="margin: 30px 0;">
        
        <h3>📋 ตัวอย่างการทำแบบประเมิน (แสดงข้อมูลตัวอย่าง)</h3>
        <table>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ผลการประเมิน</th>
                <th>วันที่ทำรายการ</th>
            </tr>
            <tr>
                <td>1</td>
                <td>นายสมชาย ใจดี (ข้อมูลตัวอย่าง)</td>
                <td>ดีมาก (5/5)</td>
                <td>2026-06-06</td>
            </tr>
        </table>
        <p style="color: #666; font-size: 14px; margin-top: 10px;">*หมายเหตุ: รายชื่ออื่นๆ ทั้งหมดถูกเก็บเป็นความลับ จะแสดงเฉพาะในระบบหลังบ้านของแอดมินเท่านั้น</p>
    </div>

</body>
</html>
