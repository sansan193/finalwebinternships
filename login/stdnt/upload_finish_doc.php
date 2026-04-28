<?php
$conn = new mysqli("localhost", "root", "", "internships");
$conn->set_charset("utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = $_POST['request_id'];
    
    // 1. ตรวจสอบว่ามีการส่งไฟล์มาจริงไหม
    if (!isset($_FILES['finish_doc']) || $_FILES['finish_doc']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => 'error', 'message' => 'ไม่พบไฟล์ที่อัปโหลด']);
        exit;
    }

    $file = $_FILES['finish_doc'];
    $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    // 2. ตรวจสอบนามสกุลไฟล์ 
    if ($file_ext !== 'pdf') {
        echo json_encode(['status' => 'error', 'message' => 'อนุญาตเฉพาะไฟล์ PDF เท่านั้น']);
        exit;
    }

    // 3. ตั้งชื่อไฟล์ใหม่เพื่อป้องกันชื่อซ้ำ
    $new_filename = "finish_" . $request_id . "_" . time() . "." . $file_ext;
    $upload_dir = "uploads/finish_docs/";
    
    // สร้างโฟลเดอร์อัตโนมัติถ้ายังไม่มี
    if (!is_dir($upload_dir)) { mkdir($upload_dir, 0777, true); }

    $upload_path = $upload_dir . $new_filename;

    // 4. ย้ายไฟล์และอัปเดตฐานข้อมูล
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        $sql = "UPDATE internships_request 
                SET finish_doc_file = ?, status_ID = 52, upload_date = NOW() 
                WHERE request_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_filename, $request_id);
        
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'บันทึกฐานข้อมูลไม่สำเร็จ']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ไม่สามารถย้ายไฟล์ไปยังโฟลเดอร์ได้']);
    }
}
$conn->close();
?>
