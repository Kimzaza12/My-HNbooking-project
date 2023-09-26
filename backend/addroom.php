<?php 
    require_once 'db_addroom.php'; 
?>


<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มห้องพักใหม่</title>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มห้องพักใหม่</title>
</head>
<body>
    <h2>เพิ่มห้องพักใหม่</h2>

    <form action="db_addroom.php" method="POST">
        <label for="room_name">ชื่อห้อง:</label>
        <input type="text" name="room_name" required><br><br>

        <label for="room_price">ราคา:</label>
        <input type="number" name="room_price" required><br><br>

        <label for="availability">สถานะความพร้อมใช้งาน:</label>
        <input type="radio" name="availability" value="1" checked> ว่าง
        <input type="radio" name="availability" value="0"> เต็ม<br><br>

        <input type="submit" value="เพิ่มห้องพัก">
        
    </form>
</body>
</html>
