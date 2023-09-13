<?php
    // สร้างการเชื่อมต่อกับฐานข้อมูล
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


    // ดึงข้อมูลจำนวนแถวในตารางที่ต้องการ
    $sql = "SELECT COUNT(*) as total_rows FROM book"; // แทน table_name ด้วยชื่อตารางที่คุณใช้งาน
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ดึงข้อมูลจากผลลัพธ์
        $row = $result->fetch_assoc();
        $total_rows = $row["total_rows"];
    } else {
        $total_rows = 0;
    }


    $difference =  5 - $total_rows;

    if($difference <= 0 ){
        $difference = 0;
    }

?>