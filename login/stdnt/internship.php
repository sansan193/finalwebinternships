<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Student') {
    header("Location: login/stdnt/stdnt.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดนิสิต</title>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/intsh.css">
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="row ">
            <div class="info-card xcol-12 col-xl-10">
                <div class="btn-back">
                    <a href="stdnt.php" class="btn-top-back">ย้อนกลับ</a>
                </div>
                <div class="text-detl mt-5">
                    <h1>รายละเอียดนิสิต</h1>
                    <hr class="red-line">
                </div>
                <div class="detl-info my-3">
                    <div class="row">
                        <div class="col-6 ">
                            <div class="info-left my-3">
                                <p>ชื่อ</p>
                                <p>นามสกุล</p>
                                <p>รหัสนิสิต</p>
                                <p>คณะ</p>
                                <p>สาขา</p>
                                <p>ชั้นปี</p>
                                <p>ปีการศึกษา</p>
                                <p>ผลการเรียนสะสม</p>
                                <p>E-mail</p>
                                <p>เบอร์โทรศัพท์</p>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="info-right bg-light my-3">
                                <p><?php echo $_SESSION['name']; ?></p>
                                <p><?php echo $_SESSION['surname']; ?></p>
                                <p><?php echo $_SESSION['username']; ?></p>
                                <p><?php echo $_SESSION['faculty']; ?></p>
                                <p><?php echo $_SESSION['major']; ?></p>
                                <p><?php echo $_SESSION['year']; ?></p>
                                <p><?php echo $_SESSION['semester']. "/" . $_SESSION['AY']; ?></p>
                                <p><?php echo $_SESSION['gpa']; ?></p>
                                <p><?php echo $_SESSION['email']; ?></p>
                                <p><?php echo $_SESSION['phone']; ?></p>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="btn-nav-group">
                    <a href="internshipnext.php" class="btn-custom btn-next-style">ต่อไป</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../../jsall/js/bootstrap.min.js"></script>
</body>
</html>
