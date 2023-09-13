<?php
// เชื่อมต่อกับฐานข้อมูล MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหล่า: " . $conn->connect_error);
}


// กำหนดโซนเวลาเป็น "Asia/Bangkok" (เวลาในเมืองไทย)
date_default_timezone_set('Asia/Bangkok');

// ดึงค่าเวลาปัจจุบัน
$current_datetime = date('Y-m-d H:i:s');

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_datetime = $_POST["current_datetime"];
    $appointment_date = $_POST["appointment_date"];
    $HN = $_POST["HN"];
    $ID_number = $_POST["ID_number"];
    $S_name = $_POST["S_name"];
    $booked_by = $_POST["booked_by"];
    $Department = $_POST["Department"];
    $P_number = $_POST["P_number"];
    $Email = $_POST["Email"];



        // รับค่า HN จากฟอร์ม
        $hn = $_POST['HN'];

        // คำสั่ง SQL เพื่อตรวจสอบการจอง
        $sql = "SELECT * FROM book_2 WHERE HN = '$hn'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // ถ้ามีการจองห้องพักอยู่แล้ว
            $message = "HN $hn ได้ทำการจองห้องพักอยู่แล้ว กรุณายกเลิกแล้วทำการจองใหม่อีกครั้ง";
            echo "<script>alert('".$message."')</script>";
            echo "<script>window.location.href='summit_2.php'</script>";
        } else {

        // เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูล
        $sql = "INSERT INTO book_2 (current_datetime, appointment_date, HN, ID_number, S_name, booked_by, Department, P_number, Email)
                VALUES ('$current_datetime', '$appointment_date', '$HN', '$ID_number', '$S_name', '$booked_by', '$Department', '$P_number', '$Email')";

        if ($conn->query($sql) === TRUE) {
            header("Location: confirm.php"); // เปลี่ยนทิศทางไปยัง confirm.php
            exit(); 
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
        }

        }
    
    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}
?>