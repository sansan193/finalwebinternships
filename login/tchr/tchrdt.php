<?php
include("../../db_connect.php");
$id = $_GET['id'];

$sql = "SELECT s.*, r.*, c.*, st.status_Name 
        FROM internships_request r
        INNER JOIN company c ON r.company_ID = c.company_ID
        INNER JOIN student s ON r.request_ID = s.request_ID
        INNER JOIN status st ON r.status_ID = st.status_ID
        WHERE r.request_ID = ?";
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
<body style="background:#333;">
    <div class="container py-5">
        <div class="card bg-light text-white p-5 rounded-4 shadow">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <button onclick="location.href='tchrlist.php'" class="btn btn-secondary w-auto mb-3">ย้อนกลับ</button>
            </div>
            <h1 class="dell text-center fw-bold">รายละเอียดข้อมูล</h1>
            <hr style="border-top:5px solid #b32d2d; opacity:1;">
            
            <!-- ส่วนแสดงข้อมูลนิสิต -->
            <div class=" bg-white text-dark p-4 rounded-3 mb-4 shadow-sm">
                <p><b>รหัสนิสิต :</b> <?php echo $data['stdnt_ID']; ?></p>
                <p><b>ชื่อ-นามสกุล :</b> <?php echo $data['stdnt_F_Name']." ".$data['stdnt_L_Name']; ?></p>
                <p><b>บริษัท :</b> <?php echo $data['company_Name']; ?></p>
                <p><b>ที่อยู่ :</b> <?php echo nl2br($data['company_Address']); ?></p>
                <p><b>รายละเอียดงาน :</b> <?php echo nl2br($data['internship_Detail']); ?></p>
                <p><b>วันที่เริ่ม :</b> <?php echo nl2br($data['request_Date_Start']); ?></p>
                <p><b>วันที่สิ้นสุด :</b> <?php echo nl2br($data['request_Date_End']); ?></p>
                <p><b>สถานะปัจจุบัน :</b> <span class="text-primary fw-bold"><?php echo $data['status_Name']; ?></span></p>
                
                <!-- แสดงเหตุผลถ้าถูกยกเลิก -->
                <?php if(!empty($data['comment_Note'])): ?>
                    <div class="alert alert-danger mt-3 mb-0">
                        <b></b> <?php echo $data['comment_Note']; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- ส่วนปุ่มจัดการสถานะ -->
            <div class="text-center">
                <?php if ($data['status_ID'] == 22): ?>
                    <div class="d-flex justify-content-center gap-3">
                        <!-- ปุ่มอนุมัติ -->
                        <form action="update_status.php" method="POST">
                            <input type="hidden" name="request_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="new_status" value="33">
                            <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill shadow">อนุมัติ</button>
                        </form>

                        <!-- ปุ่มกดเพื่อเปิดกล่องยกเลิก -->
                        <button type="button" class="btn btn-danger btn-lg px-5 rounded-pill shadow" 
                                data-bs-toggle="collapse" data-bs-target="#rejectBox">
                            ยกเลิก
                        </button>
                    </div>

                    <!-- กล่องกรอกเหตุผล -->
                    <div class="collapse mt-4" id="rejectBox">
                        <div class="card card-body bg-danger text-white border-danger shadow">
                            <form action="update_status.php" method="POST">
                                <input type="hidden" name="request_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="new_status" value="99">
                                <label class="mb-2 text-light fw-bold">หมายเหตุ การยกเลิก:</label>
                                <textarea name="comment_Note" class="form-control mb-3" rows="3" required placeholder="ระบุเหตุผล..."></textarea>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-dark px-4">ยืนยันการยกเลิก</button>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php elseif ($data['status_ID'] == 50): ?>
                    <!-- กรณีที่ 2: สถานะ 50 บันทึกการนิเทศ -->
                    <button type="button" class="btn btn-primary btn-lg px-5 rounded-pill shadow" 
                            data-bs-toggle="collapse" data-bs-target="#superviseBox">บันทึกการนิเทศสหกิจ</button>

                    <div class="collapse mt-4" id="superviseBox">
                        <div class="card card-body bg-secondary text-white border-primary shadow text-start">
                            <form action="update_status.php" method="POST">
                                <input type="hidden" name="request_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="new_status" value="51">
                                <label class="mb-2 text-light fw-bold">ผลการนิเทศ/บันทึกการนิเทศ:</label>
                                <textarea name="comment_Note" class="form-control mb-3" rows="3" required></textarea>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php elseif ($data['status_ID'] == 53): ?>
                    <!-- ✅ ส่วนใหม่: อาจารย์ตรวจสอบเอกสารจบฝึกงานและเปลี่ยนเป็น 55 -->
                    <div class="bg-white text-dark p-4 rounded-3 border-start border-success border-5 shadow-sm mb-4">
                        <h4 class="fw-bold text-success mb-3">🎓 ตรวจสอบเอกสารจบการฝึกงาน</h4>
                        <p>นิสิตส่งเอกสารสรุปผลการฝึกงานเรียบร้อยแล้ว กรุณาตรวจสอบความถูกต้อง</p>
                        
                        <!-- ปุ่มเปิดดูไฟล์ PDF -->
                        <a href="../stdnt/uploads/finish_docs/<?php echo $data['finish_doc_file']; ?>" 
                        target="_blank" 
                        class="btn btn-info btn-lg px-4 mb-3 rounded-pill shadow-sm">
                        🔍 เปิดดูไฟล์เอกสารนิสิต
                        </a>

                        <form action="update_status.php" method="POST" class="mt-2">
                            <input type="hidden" name="request_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="new_status" value="55">
                            <button type="submit" class="btn btn-success btn-lg px-5 rounded-pill shadow" 
                                    onclick="return confirm('ยืนยันผลการฝึกงานเสร็จสิ้น ใช่หรือไม่?')">
                                อนุมัติผลการฝึกงาน
                            </button>
                        </form>
                    </div>
                <?php else: ?>
                    <p class="h4 text-warning"></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <script src="../../jsall/js/bootstrap.min.js"></script>
</body>
</html>
