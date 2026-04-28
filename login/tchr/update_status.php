<?php
$conn = new mysqli("localhost", "root", "", "internships");
$conn->set_charset("utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = $_POST['request_id'];
    $new_status = $_POST['new_status'];
    $comment = isset($_POST['comment_Note']) ? trim($_POST['comment_Note']) : NULL;

    // ตรวจสอบความถูกต้อง 
    if ($new_status == 99 && empty($comment)) {
        echo "<script>alert('โปรดระบุเหตุผลในการไม่อนุมัติ'); history.back();</script>";
        exit();
    }
    if ($new_status == 51 && empty($comment)) {
        echo "<script>alert('โปรดระบุรายละเอียดการนิเทศ'); history.back();</script>";
        exit();
    }

    // เตรียม SQL อัปเดตสถานะและบันทึกโน้ต
    $sql = "UPDATE internships_request SET status_ID = ?, comment_Note = ? WHERE request_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $new_status, $comment, $request_id);

    if ($stmt->execute()) {
        header("Location: tchrdt.php?id=" . $request_id);
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึก: " . $conn->error;
    }
}
$conn->close();
?>
