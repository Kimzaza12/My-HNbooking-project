<?php
session_start();

require_once('db.php');

//อนุมัติการจอง
if (isset($_GET['approve'])) {
    $approve_HN = $_GET['approve'];
    $stmt = $conn->query("SELECT status FROM book WHERE HN =  $approve_HN");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $newStatus = $row['status'] == 'อนุมัติ' ? 'รออนุมัติ' : 'อนุมัติ';

    $approvetmt = $conn->prepare("UPDATE book SET status = :newStatus WHERE HN = :approveHN");
    $approvetmt->bindParam(':newStatus', $newStatus);
    $approvetmt->bindParam(':approveHN',  $approve_HN);
    $approvetmt->execute();

    if ($approvetmt) {
        $_SESSION['success'] = "Status has been changed successfully";
        header("refresh:2; url=officer_approve.php");
    }
}

if (isset($_GET['delete'])) {
    $delete_HN = $_GET['delete'];

    // ดึงข้อมูลที่จะถูกลบออกมาจากตาราง 'book'
    $selectstmt = $conn->prepare("SELECT * FROM book WHERE HN = ?");
    $selectstmt->bindParam(1, $delete_HN, PDO::PARAM_STR);
    $selectstmt->execute();
    $result = $selectstmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // เพิ่มข้อมูลลงในตาราง 'history'
        $insertstmt = $conn->prepare("INSERT INTO history (h_HN, h_idnum, h_name, h_book, h_dp, h_room) VALUES (?, ?, ?, ?, ?, ?)");
        $insertstmt->bindParam(1, $result['HN'], PDO::PARAM_STR);
        $insertstmt->bindParam(2, $result['ID_number'], PDO::PARAM_STR);
        $insertstmt->bindParam(3, $result['S_name'], PDO::PARAM_STR);
        $insertstmt->bindParam(4, $result['booked_by'], PDO::PARAM_STR);
        $insertstmt->bindParam(5, $result['Department'], PDO::PARAM_STR);
        $insertstmt->bindParam(6, $result['room'], PDO::PARAM_STR);
        $insertstmt->execute();

        // ลบข้อมูลจากตาราง 'book'
        $deletestmt = $conn->prepare("DELETE FROM book WHERE HN = ?");
        $deletestmt->bindValue(1, $delete_HN, PDO::PARAM_STR); // ใช้ bindValue แทน bindParam
        $deletestmt->execute();

        if ($deletestmt && $insertstmt) {
            echo "<script>alert('Data has been deleted successfully and added to history');</script>";
            $_SESSION['success'] = "Data has been deleted successfully and added to history";
            header("refresh:1; url=officer_nroom.php");
        }
    } else {
        echo "<script>alert('Data not found');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติการจอง</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/indexcss.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">

</head>

<body>
    <?php
    if (isset($_SESSION['officer_login'])) {
        $officer_id = $_SESSION['officer_login'];
        $stmt = $conn->query("SELECT * FROM member WHERE m_id = $officer_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    include("navbar.php")
    ?>

<nav class="sidebar">
        <ul class="nav flex-column">
            <hr>
            <div class="ad-name">
                <h1> <?php echo  $row['m_firstname'] . ' ' . $row['m_lastname'] ?> </h1>
            </div>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="officer_index.php"> หน้าหลัก </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="officer_department.php"> แผนกผู้ป่วย </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="officer_room.php"> ประเภทห้องพัก </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="officer_nroom.php"> สถานะห้องพัก </a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="officer_approve.php"> อนุมัติการจอง </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="officer_history.php"> ประวัติการจอง </a>
            </li>
            <div class="boxout">
                <div class="endout">
                    <li class="nav-item">
                        <a class="nav-link" href="login_page.php"> ออกจากระบบ </a>
                    </li>
                </div>
            </div>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>อนุมัติการจอง</h3>
                <hr style="width:204%; margin-left:0">
            </div>

            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>

            <table class="table table-bordered small-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">HN ผู้ป่วย</th>
                        <th scope="col">รหัสบัตรประชาชน</th>
                        <th scope="col">ชื่อ-นามสกุล(ผู้ป่วย)</th>
                        <th scope="col">แผนก</th>
                        <th scope="col">ชื่อ-นามสกุล(ผู้จอง)</th>
                        <th scope="col">ห้องพัก</th>
                        <th scope="col">สถานะการจอง</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $stmt = $conn->query("SELECT * FROM book");
                    $stmt->execute();
                    $book = $stmt->fetchAll();

                    if (!$book) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                        $i = 1;
                        foreach ($book as $rbook) {
                    ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td><?php echo $rbook['HN']; ?></td>
                                <td><?php echo $rbook['ID_number']; ?></td>
                                <td><?php echo $rbook['S_name']; ?></td>
                                <td><?php echo $rbook['Department']; ?></td>
                                <td><?php echo $rbook['booked_by']; ?></td>
                                <td><?php echo $rbook['room']; ?></td>
                                <td><?php echo $rbook['Status']; ?></td>
                                <td>
                                    <a href="?approve=<?php echo $rbook['HN']; ?>" class="btn btn-info">อนุมัติ</a>
                                    <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $rbook['HN']; ?>" class="btn btn-danger">ยกเลิกการจอง</a>
                            </tr>
                    <?php
                            $i++;
                        }
                    } ?>
                </tbody>

            </table>
        </div>


        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>