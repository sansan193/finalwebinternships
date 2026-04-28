<?php

// เปิดแสดงผลการ Error ทั้งหมด เพื่อช่วย Debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['request_id'];
    
    // หา Path ที่ถูกต้อง
    $target_dir = "uploads/official/"; 
    
    // ตรวจสอบว่ามีโฟลเดอร์ไหม
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = $_FILES["official_file"]["name"];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_name = "doc_" . $id . "_" . time() . "." . $file_ext;
    $target_file = $target_dir . $new_name;

    if ($_FILES["official_file"]["error"] == 0) {
        if (move_uploaded_file($_FILES["official_file"]["tmp_name"], $target_file)) {
            
            $sql = "UPDATE internships_request SET official_doc_file = ?, status_ID = 44 WHERE request_ID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $new_name, $id);
            
            if ($stmt->execute()) {
                echo "<script>alert('อัปโหลดสำเร็จ!'); window.location='stfflist.php';</script>";
            } else {
                echo "DB Error: " . $conn->error;
            }
        } else {
            echo "Error: ไม่สามารถย้ายไฟล์ไปที่ $target_dir ได้ (เช็ค Permission หรือ Path)";
        }
    } else {
        echo "Error Upload: Code " . $_FILES["official_file"]["error"];
    }
}
?>
