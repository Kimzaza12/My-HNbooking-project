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


    $room_name = $_POST["room_name"];
    $room_price = $_POST["room_price"];
    $availability = isset($_POST["availability"]) ? 1 : 0; // ตรวจสอบว่าห้องพักว่างหรือไม่

    // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลในตาราง "room"
    $sql = "INSERT INTO room (room_name, room_price, availability) VALUES ('$room_name', $room_price, $availability)";

    if ($conn->query($sql) === TRUE) {
        echo "เพิ่มข้อมูลห้องพักใหม่เรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูลห้องพัก: " . $conn->error;
    }

    // ปิดการเชื่อมต่อกับฐานข้อมูล
    $conn->close();