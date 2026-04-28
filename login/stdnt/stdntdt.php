<?php
session_start();
// 1. เชื่อมต่อฐานข้อมูล
include("../../db_connect.php");

if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// 2. รับค่า ID จาก URL
$request_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$request_id) {
    die("ไม่พบรหัสรายการ");
}

// 3. ดึงข้อมูลจาก 4 ตาราง (เพิ่ม INNER JOIN ตาราง status)
$sql = "SELECT s.*, r.*, c.*, st.status_Name 
        FROM internships_request r
        INNER JOIN company c ON r.company_ID = c.company_ID
        INNER JOIN student s ON r.request_ID = s.request_ID
        INNER JOIN status st ON r.status_ID = st.status_ID
        WHERE r.request_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $request_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) { die("ไม่พบข้อมูลที่ต้องการ"); }

// 4. ตั้งค่าตัวแปรการแสดงผล (ดึงค่า Name จาก SQL มาใช้เป็น Text)
$status_id = $data['status_ID'];
$status_text = $data['status_Name']; 
$status_subtext = "";
$status_color = "#333"; 

// 5. จัดการ "สี" และ "ข้อความรอง" ตามเงื่อนไข (คงไว้เฉพาะส่วนที่ DB ไม่มีเก็บ)
if ($status_id == 11) {
    $status_color = "#ca5b00";
    $status_subtext = "** รอการตรวจสอบเพื่อรับเรื่อง";
} elseif ($status_id == 22) {
    $status_color = "#be9100";
    $status_subtext = "** รอการอนุมัติจากอาจารย์";
} elseif ($status_id == 33) {
    $status_color = "#28a745";
    $status_subtext = "** รอดำเนินการออกใบส่งตัว";
} elseif ($status_id == 44) {
    $status_color = "#00cdb9";
} elseif ($status_id == 50) {
    $status_color = "#59006d";
} elseif ($status_id == 52) {
    $status_color = "#59006d";
    $status_subtext = "** รอตรวจสอบเอกสาร";
} elseif ($status_id == 53) {
    $status_color = "#59006d";
    $status_subtext = "** รออาจารย์อนุมัติการจบฝึกงาน";
} elseif ($status_id == 99) {
    $status_color = "#ff0000";
    $status_subtext = !empty($data['comment_Note']) ? "เหตุผล: " . $data['comment_Note'] : "** เอกสารผิดพลาด กรุณาตรวจสอบข้อมูลและส่งใหม่";
}
?>

<!-- ส่วน HTML เหมือนเดิม แต่เรียกใช้ $status_text ที่ดึงมาจาก SQL -->


<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดคำขอ</title>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/stdntdt.css">
</head>
<body class="bg-secondary">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="deail-card shadow-lg">   
                    <h1 class="main-title text-center text-white">รายละเอียดคำขอ</h1>
                    <hr class="red-line-top">

                    <div class="detail-card shadow-lg p-1 mx-3 my-3">
                        <!-- แสดงสถานะปัจจุบัน -->
                        <div class="status-section text-center mb-5">
                            <h2 style="color: <?php echo $status_color; ?>;" class="fw-bold">
                                สถานะปัจจุบัน: <?php echo $status_text; ?>
                            </h2>
                            <?php if ($status_subtext != ""): ?>
                                <p style="color: <?php echo $status_color; ?>;" class="fw-bold">
                                    <?php echo $status_subtext; ?>
                                </p>
                            <?php endif; ?>
                        </div>



                        <?php if ($status_id == 99): ?>
                            <div class="new-request mt-4">
                                <p class="text-muted">คุณสามารถทำการส่งคำขอฝึกงานใหม่อได้อีกครั้ง</p>
                                <a href="../stdnt/internship.php" class="btn btn-danger btn-lg rounded-pill px-5 shadow">
                                    ➕ เริ่มแจ้งคำขอใหม่
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($status_id >= 51): ?>
                            <div class="supervise-result text-center my-4 p-4 border rounded bg-white shadow-sm">
                                <h4 class="text-primary fw-bold">📢 บันทึกการนิเทศจากอาจารย์</h4>
                                <p class="text-dark fs-5">
                                    <?php echo !empty($data['comment_Note']) ? nl2br($data['comment_Note']) : "ไม่มีบันทึกรายละเอียด"; ?>
                                </p>                                

                            </div>
                        <?php endif; ?>

                        <?php if ($status_id == 51): ?>
                            <div class="supervise-result text-center my-4 p-4 border rounded bg-white shadow-sm">              <!-- ฟอร์มอัปโหลดเอกสาร -->
                                <hr>
                                <h5 class="fw-bold mb-3">📁 แนบเอกสารการฝึกงานเสร็จสิ้น</h5>
                                <p class="text-muted small">* เมื่ออัปโหลดแล้ว โปรดติดตามผลการตรวจสอบ และ อนุมัติ</p>
                                
                                <form id="uploadFinishForm" enctype="multipart/form-data">
                                    <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
                                    <div class="mb-3">
                                        <input type="file" name="finish_doc" id="finish_doc" class="form-control w-75 mx-auto" required>
                                    </div>
                                    <button type="button" onclick="uploadAndFinish()" class="btn btn-success rounded-pill px-5">
                                        ยืนยันการส่งเอกสารจบฝึกงาน
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
                        <!-- ✅ ส่วนดาวน์โหลดเอกสาร -->
                        <?php 
                            // สร้าง array ของสถานะที่อนุญาตให้เห็นปุ่มดาวน์โหลด
                            $allowed_statuses = [44, 50,]; 

                            // เช็คว่ามีไฟล์ และ status_ID อยู่ในกลุ่มที่กำหนดหรือไม่
                            if (!empty($data['official_doc_file']) && in_array($data['status_ID'], $allowed_statuses)): 
                            ?>
                                <div class="download-box text-center my-4">
                                    <h5 class="doc-btn mb-3">📄 กรุณาพิมพ์เอกสาร<br>และนำส่งยังองค์กรหรือบริษัทตามที่แจ้งมา</h5>
                                    
                                    <!-- ปุ่มดาวน์โหลด -->
                                    <a href="../staff/uploads/official/<?php echo $data['official_doc_file']; ?>" 
                                    class="btn-download-pdf" 
                                    download
                                    onclick="updateStatusTo50(<?php echo $request_id; ?>)">
                                        ดาวน์โหลดเอกสาร (PDF)
                                    </a>
                                </div>
                        <?php endif; ?>

                        <!-- ส่วนข้อมูลนิสิตและบริษัท -->
                        <div class="row justify-content-center ">
                            <div class="info-content p-2">
                                <div class="col-6">
                                    <div class="label">
                                        <span class="">ชื่อ นามสกุล</span>
                                        <span class="">ภาคเรียน</span>
                                        <span class="">เบอร์โทรศัพท์</span>
                                        <span class="">E-mail</span>
                                        <span class="">วันที่เริ่ม</span>
                                        <span class="">วันที่สิ้นสุด</span>
                                        <span class="">ชื่อบริษัท</span>
                                        <span class="">ที่อยู่</span>
                                        <span class="">จังหวัด</span>
                                        <span class="">อำเภอ/เขต</span>
                                        <span class="">ตำบล/ แขวง</span>
                                        <span class="">ติดต่อ</span>
                                        <span class="">รายละเอียดงาน</span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="value">
                                        <span class=""><?php echo $data['stdnt_F_Name']." ".$data['stdnt_L_Name']; ?></span>
                                        <span class=""><?php echo $data['stdnt_Semester']."/".$data['stdnt_AY'] ; ?></span> <!-- หรือเปลี่ยนเป็นค่าจาก DB -->
                                        <span class=""><?php echo $data['stdnt_Phone'] ?? '0987654321'; ?></span>                           
                                        <span class=""><?php echo $data['stdnt_Email'] ?? 'student@gmail.com'; ?></span>                            
                                        <span class=""><?php echo $data['request_Date_Start']; ?></span>                           
                                        <span class=""><?php echo $data['request_Date_End']; ?></span>                           
                                        <span class=""><?php echo $data['company_Name']; ?></span>                         
                                        <span class=""><?php echo nl2br($data['company_Address']); ?></span>
                                        <span class=""><?php echo $data['province']; ?></span>                          
                                        <span class=""><?php echo $data['district']; ?></span>
                                        <span class=""><?php echo $data['sub_District']; ?></span>
                                        <span class=""><?php echo $data['company_Contacts']; ?></span>                         
                                        <span class=""><?php echo nl2br($data['internship_Detail']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ปุ่มย้อนกลับ -->
                        <div class="text-center mt-1">
                            <button onclick="location.href='stdnt.php'" class="btn btn-secondary">ย้อนกลับ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../jsall/status_handler.js"></script>

</body>
</html>
