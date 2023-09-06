<?php
// เชื่อมต่อกับฐานข้อมูล (คุณต้องแก้ไขรายละเอียดตามฐานข้อมูลของคุณ)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$checkin_date = $_POST['checkin_date'];
$checkout_date = $_POST['checkout_date'];
$hospital_id = $_POST['hospital_id'];
$citizen_id = $_POST['citizen_id'];
$patient_name = $_POST['patient_name'];
$booker_name = $_POST['booker_name'];
$contact_number = $_POST['contact_number'];
$department = $_POST['department'];

// สร้างคำสั่ง SQL สำหรับการเพิ่มข้อมูลในฐานข้อมูล
$sql = "INSERT INTO booking_data (checkin_date, checkout_date, hospital_id, citizen_id, patient_name, booker_name, contact_number, department)
        VALUES ('$checkin_date', '$checkout_date', '$hospital_id', '$citizen_id', '$patient_name', '$booker_name', '$contact_number', '$department')";




// ตรวจสอบการเพิ่มข้อมูลลงในฐานข้อมูล
if ($conn->query($sql) === TRUE) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
    sleep(5); // หน่วงเวลา 5 วินาที
    header("Location: confirm.php"); // เปลี่ยนทิศทางไปยัง confirm.php
    exit(); 
} else {
    echo "การบันทึกข้อมูลล้มเหลว: " . $conn->error;
}





// ปิดการเชื่อมต่อ
$conn->close();
?>
