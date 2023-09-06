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
                            <a href="booking.php">ยกเลิกห้องพัก</a>
                            <a href="check.php">ตรวจสอบการจอง</a>
                            <a href="contact.php">ติดต่อสอบถาม</a>
                    </div>

                </div>

            </div>


            
            <div class="header">

                <div class="bgwhite">


                    <div class="tablehos">

                    

                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "hospital";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("การเชื่อมต่อล้มเหลือ: " . $conn->connect_error);
                            }

                            $rows_per_page = 10; // จำนวนแถวต่อหน้า

                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start_record = ($page - 1) * $rows_per_page;

                            $sql = "SELECT * FROM booking_data LIMIT $start_record, $rows_per_page";
                            $result = $conn->query($sql);

                            echo "<table>";
                            echo "<tr><th>ID</th><th>Check-in Date</th><th>Check-out Date</th><th>Hospital ID</th><th>Citizen ID</th><th>Patient Name</th><th>Booker Name</th><th>Contact Number</th><th>Department</th></tr>";

                            for ($i = 1; $i <= $rows_per_page; $i++) {
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
                                    echo "<tr>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "</tr>";
                                }
                            }

                            echo "</table>";

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