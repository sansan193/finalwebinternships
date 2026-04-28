<?php

// ตรวจสอบสิทธิ์การเข้าถึง
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Student') {
    header("Location: login/stdnt/stdnt.php");
    exit();
}
?>

<?php

// รับค่าข้อมูลที่ถูกส่งมาจากฟอร์มผ่าน method POST
$start_date = $_POST['request_Date_Start'];
$end_date = $_POST['request_Date_End'];
$company_name = $_POST['company_Name'];
$address = $_POST['company_Address'];
$contact = $_POST['company_Contact'];
$province = $_POST['province'];
$district = $_POST['district'];
$sub_district = $_POST['sub_District'];
$detail = $_POST['internship_Detail'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/confm.css">

</head>
<!-- หน้าตรวจสอบข้อมูล -->
<body class="bg-dark-custom">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7">
                <div class="confirmation-card ">
                    <!-- ปุ่มย้อนกลับด้านบน -->
                    <div class="top-nav">
                        <button onclick="history.back()" class="btn-back-link">ย้อนกลับ</button>
                    </div>

                    <h1 class="header-title">ตรวจสอบข้อมูล</h1>
                    <hr class="red-divider">

                    <div class="info-container">
                        <!-- แถวข้อมูลแต่ละชุด -->
                        <div class="info-row">
                            <span class="label">ชื่อ นามสกุล</span>
                            <span class="value"><?php echo $_SESSION['name'] . " " . $_SESSION['surname']; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">ภาคเรียน</span>
                            <span class="value"><?php echo $_SESSION['year']; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">เบอร์โทรศัพท์</span>
                            <span class="value"><?php echo $_SESSION['phone']; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">E-mail</span>
                            <span class="value"><?php echo $_SESSION['email']; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">วันที่เริ่ม</span>
                            <span class="value"><?php echo $start_date; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">วันที่สิ้นสุด</span>
                            <span class="value"><?php echo $end_date; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">ชื่อบริษัท</span>
                            <span class="value"><?php echo $company_name; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">ที่อยู่</span>
                            <span class="value"><?php echo nl2br($address); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">จังหวัด</span>
                            <span class="value"><?php echo $province; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">อำเภอ/เขต</span>
                            <span class="value"><?php echo $district; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">ตำบล/แขวง</span>
                            <span class="value"><?php echo $sub_district; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">ติดต่อ</span>
                            <span class="value"><?php echo $contact; ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">รายละเอียดงาน</span>
                            <span class="value"><?php echo $detail; ?></span>
                        </div>

                    <!-- ส่วนปุ่มกดด้านล่าง -->
                        <div class=" justify-content-center d-flex">
                            <form action="save.php" method="POST" class="action-buttons">
                                <div class="justify-content-center">
                                    <!-- Hidden inputs -->
                                    <input type="hidden" name="request_Date_Start" value="<?php echo $start_date; ?>">
                                    <input type="hidden" name="request_Date_End" value="<?php echo $end_date; ?>">
                                    <input type="hidden" name="company_Name" value="<?php echo $company_name; ?>">
                                    <input type="hidden" name="company_Address" value="<?php echo $address; ?>">
                                    <input type="hidden" name="province" value="<?php echo $province; ?>">
                                    <input type="hidden" name="district" value="<?php echo $district; ?>">
                                    <input type="hidden" name="sub_District" value="<?php echo $sub_district; ?>">
                                    <input type="hidden" name="company_Contact" value="<?php echo $contact; ?>">
                                    <input type="hidden" name="internship_Detail" value="<?php echo $detail; ?>">
                                    
                                    <div class="submit-box d-flex">
                                        <button type="submit" class="btn-confirm">ยืนยัน</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>