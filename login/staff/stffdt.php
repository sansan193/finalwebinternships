<?php
// เชื่อมต่อฐานข้อมูล
include("../../db_connect.php");
$id = $_GET['id'];

// เขียนคำสั่ง SQL เพื่อดึงข้อมูลจากตาราง 
$sql = "SELECT s.*, r.*, c.*, st.status_Name 
        FROM internships_request r
        INNER JOIN company c ON r.company_ID = c.company_ID
        INNER JOIN student s ON r.request_ID = s.request_ID
        INNER JOIN status st ON r.status_ID = st.status_ID
        WHERE r.request_ID = ?";

// ใช้ Prepared Statement 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/dtstdnt.css">
</head>
<body style="background:#2c3e50;"> 
    <div class="container py-5">
        <div class="card bg-light p-5 rounded-4 shadow">
            <div class=" justify-content-between align-items-center mb-4">
                <button onclick="location.href='stfflist.php'" class="btn btn-secondary">ย้อนกลับ</button>
                <h2 class="fw-bold text-dark text-center">ตรวจสอบข้อมูลนิสิต</h2>
            </div>
            <hr style="border-top:5px solid #2c3e50; opacity:1;">
            
            <div class="info-box bg-white p-4 rounded shadow-sm mb-4 text-dark">
                <p><b>ชื่อนิสิต:</b> <?php echo $data['stdnt_F_Name']." ".$data['stdnt_L_Name']; ?></p>
                <p><b>หน่วยงาน:</b> <?php echo $data['company_Name']; ?></p>
                <p><b>จังหวัด:</b> <?php echo $data['province']; ?></p>
                <p><b>อำเภอ/เขต:</b> <?php echo $data['district']; ?></p>
                <p><b>ตำบล/แขวง:</b> <?php echo $data['sub_District']; ?></p>
                <p><b>โทรศัพท์:</b> <?php echo $data['stdnt_NumPhone']; ?></p>
                <p><b>วันที่เริ่มฝึกงาน:</b> <?php echo $data['request_Date_Start']; ?></p>
                <p><b>วันที่สิ้นสุดฝึกงาน:</b> <?php echo $data['request_Date_End']; ?></p>
                <p><b>รายละเอียด:</b> <?php echo $data['internship_Detail']; ?></p>
                <p><b>สถานะปัจจุบัน:</b> <span class=" text-primary"><?php echo $data['status_Name']; ?></span></p>
            </div>
            <div class="text-center">
                <?php if ($data['status_ID'] == 11): ?>
                    <!-- ✅ สถานะ 11: เจ้าหน้าที่กดรับเรื่อง -->
                    <form action="update_status.php" method="POST">
                        <input type="hidden" name="request_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="new_status" value="22">
                        <button type="submit" class="btn btn-primary btn-lg px-5">รับเรื่อง</button>
                    </form>

                <?php elseif ($data['status_ID'] == 33): ?>
                    <!-- ✅ สถานะ 33: เจ้าหน้าที่แนบเอกสารใบส่งตัว -->
                    <div class="p-4 rounded shadow-sm" style="background: #e9ecef; border: 2px dashed #2c3e50;">
                        <h4 class="fw-bold text-dark mb-3">📤 แนบเอกสารใบส่งตัวให้นิสิต</h4>
                        <form action="upload_official_doc.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="request_id" value="<?php echo $id; ?>">
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    <input type="file" name="official_file" class="form-control mb-3" accept=".pdf" required>
                                    <button type="submit" class="btn btn-success btn-lg w-100">อัปโหลดและออกใบส่งตัว</button>
                                </div>
                            </div>
                        </form>
                    </div>
                
                <?php elseif ($data['status_ID'] == 52): ?>
                    <!-- ✅ สถานะ 52: เจ้าหน้าที่ตรวจสอบเอกสารจบฝึกงานจากนิสิต -->
                    <div class="p-4 rounded shadow-sm" style="background: #f8f9fa; border: 2px solid #28a745;">
                    <h4 class="fw-bold text-dark mb-3 text-center">📄 ตรวจสอบเอกสารจบฝึกงาน</h4>

                    <div class="text-center mb-4">
                        <p>นิสิตได้อัปโหลดเอกสารเรียบร้อยแล้ว กรุณาตรวจสอบความถูกต้อง</p>
                        <!-- ปุ่มเปิดดูไฟล์ PDF ที่นิสิตแนบมา -->
                        <a href="../stdnt/uploads/finish_docs/<?php echo $data['finish_doc_file']; ?>" 
                            target="_blank" 
                            class="btn btn-info btn-lg px-4 mb-3">
                            🔍 เปิดดูเอกสารที่นิสิตแนบ
                        </a>
                    </div>

                    <form action="update_status.php" method="POST" class="text-center">
                        <input type="hidden" name="request_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="new_status" value="53"> <!-- เปลี่ยนเป็น 55 (เสร็จสิ้น) -->
                        <button type="submit" class="btn btn-success btn-lg px-5 shadow" 
                                onclick="return confirm('ยืนยันว่าเอกสารถูกต้อง และต้องการเปลี่ยนสถานะเป็น ฝึกงานเสร็จสิ้น ใช่หรือไม่?')">
                            ✅ ตรวจสอบเรียบร้อย
                        </button>
                    </form>
                    </div>

                <?php else: ?>
                    <!-- ✅ สถานะอื่นๆ -->
                    <div class="alert alert-success fw-bold">
                        สถานะปัจจุบัน: <?php echo $data['status_Name']; ?> (ดำเนินการแล้ว)
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="../../jsall/js/bootstrap.min.js"></script>
</body>
</html>
