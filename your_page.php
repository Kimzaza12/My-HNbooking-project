<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <link rel="stylesheet" href="css/style1-1.css">
    <link rel="stylesheet" href="css/style6.css">
    <link rel="stylesheet" href="css/style5.css">

    <style>        
        body{ margin: 0; }     
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">

</head>


<body>
            <div class="bar">
            <div class="topic">
                    <div class="logo"></div>
                    <div class="navtext">
                        <p>โรงพยาบาลปอปลาตากลม</p>
                        <div class="bargreen"></div>
                        <div class="navtext2">
                            <p>จังหวัดมอ.หาดใหญ่</p> 
                        </div>
                    </div>

                <div class="boxbt">
                    <div class="bt">
                            <a href="main.php">หน้าหลัก</a>
                            <a href="register.php">ลงทะเบียน</a>
                            <a href="booking.php">จองห้องพัก</a>
                            <a href="cancel.php">ยกเลิกห้องพัก</a>
                            <a href="check.php">ตรวจสอบการจอง</a>
                            <a href="contact.php">ติดต่อสอบถาม</a>
                    </div>

                </div>

            </div>


            
            <div class="header">

                <div class="bgwhite">


                    <div class="tablehos">

                    

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

                            // กำหนดจำนวนแถวต่อหน้า
                            $rows_per_page = 10;

                            // รับค่าหน้าที่ต้องการแสดงจาก URL
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;

                            // คำนวณหน้าเริ่มต้นของแถวในฐานข้อมูล
                            $start_from = ($page - 1) * $rows_per_page;

                            // สร้างคำสั่ง SQL เพื่อดึงข้อมูลในแต่ละหน้า
                            $sql = "SELECT * FROM booking_data LIMIT $start_from, $rows_per_page";
                            $result = $conn->query($sql);

                            // แสดงตารางข้อมูล
                            // แสดงตารางข้อมูล
                            echo "<table>";
                            echo "<tr><th>ID</th><th>Check-in Date</th><th>Check-out Date</th><th>Hospital ID</th><th>Citizen ID</th><th>Patient Name</th><th>Booker Name</th><th>Contact Number</th><th>Department</th></tr>";

                            // แสดงแถวข้อมูล
                            for ($i = 0; $i < $rows_per_page; $i++) {
                                if ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row["id"]."</td>";
                                    echo "<td>".$row["checkin_date"]."</td>";
                                    echo "<td>".$row["checkout_date"]."</td>";
                                    echo "<td>".$row["hospital_id"]."</td>";
                                    echo "<td>".$row["citizen_id"]."</td>";
                                    echo "<td>".$row["patient_name"]."</td>";
                                    echo "<td>".$row["booker_name"]."</td>";
                                    echo "<td>".$row["contact_number"]."</td>";
                                    echo "<td>".$row["department"]."</td>";
                                    echo "</tr>";
                                } else {
                                    // ถ้าไม่มีข้อมูลแล้วให้เพิ่มแถวที่เป็นค่าว่าง
                                    echo "<tr><td colspan='9'>&nbsp;</td></tr>";
                                }
                            }

                            echo "</table>";





                            // ปิดการเชื่อมต่อ
                            $conn->close();
                        ?>

                    

                            <div class="tablebt">
                                <div class="pagination">
                                    <a href="your_page.php?page=1">หน้า 1 </a>
                                    <a href="your_page.php?page=2">หน้า 2 </a>
                                    <a href="your_page.php?page=3">หน้า 3 </a>
                                </div>
                            </div>     

                    </div>        





                    
            

                             



                </div>



                                





            </div>
          






            
</body>
</html>