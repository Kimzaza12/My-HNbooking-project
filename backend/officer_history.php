<?php
session_start();

require_once('db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการจอง</title>

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
            <li class="nav-item">
                <a class="nav-link" href="officer_approve.php"> ข้อมูลการจอง </a>
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
                <h3>ประวัติการจอง</h3>
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
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $stmt = $conn->query("SELECT * FROM history");
                    $stmt->execute();
                    $history = $stmt->fetchAll();

                    if (!$history) {
                        echo "<p><td colspan='8' class='text-center'>No data available</td></p>";
                    } else {
                        $i = 1;
                        foreach ($history as $ht) {
                    ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td><?php echo $ht['h_HN']; ?></td>
                                <td><?php echo $ht['h_idnum']; ?></td>
                                <td><?php echo $ht['h_name']; ?></td>
                                <td><?php echo $ht['h_dp']; ?></td>
                                <td><?php echo $ht['h_book']; ?></td>
                                <td><?php echo $ht['h_room']; ?></td>
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