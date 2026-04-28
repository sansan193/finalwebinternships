<?php
// 1. เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "internships");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $request_id = $_POST['request_id'];
    $new_status = $_POST['new_status'];
    
    // รับค่าหมายเหตุ/เหตุผล (ถ้ามีส่งมา)
    $comment = isset($_POST['comment_Note']) ? trim($_POST['comment_Note']) : null;

    // --- ส่วนตรวจสอบความถูกต้อง (Validation) ---
    // ถ้าสถานะเป็น 99 (ยกเลิก) หรือ 51 (บันทึกนิเทศ) ต้องบังคับกรอกข้อความ
    if (($new_status == 99 || $new_status == 51) && empty($comment)) {
        echo "<script>alert('กรุณาระบุรายละเอียดหรือเหตุผลให้ครบถ้วน'); history.back();</script>";
        exit();
    }

    // --- ส่วนการบันทึกข้อมูล ---
    // ใช้คำสั่งอัปเดตทั้ง Status และ Comment ในครั้งเดียว
    $sql = "UPDATE internships_request SET status_ID = ?, comment_Note = ? WHERE request_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $new_status, $comment, $request_id);

    if ($stmt->execute()) {
        // --- ส่วนการเปลี่ยนหน้ากลับ (Redirect) ---
        // เช็คว่าสถานะที่เปลี่ยนเป็นของใคร เพื่อส่งกลับให้ถูกหน้า
        // ถ้าเป็นสถานะของอาจารย์ (33, 51, 99) ส่งไป tchrdt.php
        // ถ้าเป็นสถานะของเจ้าหน้าที่ (22, 44, 55) ส่งไป stffdt.php
        
        if (in_array($new_status, [33, 51, 99])) {
            $redirect_page = "tchrdt.php";
        } else {
            $redirect_page = "stffdt.php";
        }

        header("Location: " . $redirect_page . "?id=" . $request_id);
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึก: " . $conn->error;
    }
}

$conn->close();
?>
