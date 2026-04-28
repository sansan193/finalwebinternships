<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Student') {
    header("Location: login.php");
    exit();
}

// เชื่อมต่อฐานข้อมูล
include("../../db_connect.php");

// ดึงรหัสนักเรียนจาก Session
$student_id = $_SESSION['stdnt_ID'] ?? $_SESSION['username']; 

// เช็คแค่ว่า request_ID ของนักเรียนคนนี้มีค่าหรือไม่
$sql = "SELECT request_ID FROM student WHERE stdnt_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

// ถ้า request_ID ไม่เป็นค่าว่าง แสดงว่าส่งคำขอแล้ว
$has_request = !empty($row['request_ID']);
$my_request_id = $row['request_ID'];
?>


<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/logintrue.css">
</head>


<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="prof-card p-5 shadow-sm ">
                    <div class="btn-back-box">
                        <a href="../../index.php" class="btn-back btn-secondary mt-3">กลับสู่หน้าหลัก</a>
                    </div>
                    <h1 class="nisit text-center fw-bold">นิสิต</h1>
                    <h1 class="stdnt-name fw-bold">
                        <?php echo $_SESSION['name'] . " " . $_SESSION['surname']; ?>
                    </h1>
                    <h1 class="user-name"><?php echo $_SESSION['username']; ?></h1>
                    <hr class="red-line mb-5">
                    <div class="row justify-content-center">
                        <div class="stdnt-info">
                            <div class="col-6">
                                <div class="info-left">
                                    <p>ชั้นปีที่ </p>
                                    <p>ผลการเรียนสะสม </p>
                                    <p>E-mail </p>
                                    <p>เบอร์โทรศัพท์ </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="info-right">
                                    <p><?php echo $_SESSION['year']; ?></p>
                                    <p><?php echo $_SESSION['gpa']; ?> </p>
                                    <p><?php echo $_SESSION['email']; ?> </p>
                                    <p><?php echo $_SESSION['phone']; ?> </p>                           
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="btn-down d-grid col-8 mx-auto mt-1">
                        <p class="txt-int">แจ้งคำขอฝึกงานสำหรับนิสิตที่มีความประสงค์จะฝึกงาน</p>
                        </p>
                        <div class="reqst d-grid">
                            <div class="req ">
                                <?php if (!$has_request): ?>
                                <!-- 1. ถ้ายังไม่มีข้อมูล (request_ID เป็นว่าง) -->
                                <a href="internship.php" class="btn btn-secondary mt-1">แจ้งคำขอฝึกงาน</a>
                            <?php else: ?>
                                <!-- 2. ถ้ามีข้อมูลแล้ว (ส่งคำขอแล้ว) -->

                                <small class="text-center text-light">* คุณได้ส่งคำขอไปเรียบร้อยแล้ว</small>
                                <a href="stdntdt.php?id=<?php echo $my_request_id; ?>" class="btn btn-primary mt-3">
                                    ดูรายละเอียดคำขอ
                                </a>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>