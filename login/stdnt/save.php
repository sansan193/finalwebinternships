<?php
// 1. เริ่มต้น Session
session_start();

// 2. เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "internships"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$conn->set_charset("utf8");

// 3. ตรวจสอบรหัสนักเรียนจาก Session
$student_id = $_SESSION['stdnt_ID'] ?? $_SESSION['username'] ?? $_SESSION['id'] ?? null;

if (!$student_id) {
    die("ผิดพลาด: ไม่พบรหัสนักเรียนในระบบ กรุณา Login ใหม่");
}

//เริ่ม Transaction
$conn->begin_transaction();

try {
    // --- ส่วนที่ 0: ล้างข้อมูลเดิมกรณีเป็นการ "ส่งคำขอใหม่" (สถานะ 99) ---
    $check_sql = "SELECT request_ID FROM student WHERE stdnt_ID = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("s", $student_id);
    $stmt_check->execute();
    $res = $stmt_check->get_result();
    
    if ($row = $res->fetch_assoc()) {
        $old_request_id = $row['request_ID'];
        if ($old_request_id) {
            // ลบข้อมูลบริษัทเดิมที่เชื่อมอยู่ 
            $conn->query("DELETE FROM company WHERE company_ID = (SELECT company_ID FROM internships_request WHERE request_ID = '$old_request_id')");
            // ลบรายการคำขอเดิม
            $conn->query("DELETE FROM internships_request WHERE request_ID = '$old_request_id'");
            // เซ็ตค่าในตาราง student ให้ว่างก่อนเพื่อรออัปเดตใหม่
            $conn->query("UPDATE student SET request_ID = NULL WHERE stdnt_ID = '$student_id'");
        }
    }

    // --- ส่วนที่ 1: บันทึกข้อมูลบริษัท---
    $com_name     = $_POST['company_Name'];
    $address      = $_POST['company_Address'];
    $contact      = $_POST['company_Contact'];
    $province     = $_POST['province'];
    $district     = $_POST['district'];
    $sub_district = $_POST['sub_District'];

    $sql_com = "INSERT INTO company (company_Name, company_Address, company_Contacts, province, district, sub_District) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql_com);
    $stmt1->bind_param("ssssss", $com_name, $address, $contact, $province, $district, $sub_district);
    $stmt1->execute();
    $last_company_id = $conn->insert_id;

    // --- ส่วนที่ 2: บันทึกใบคำร้องใหม่ ---
    $start_date = $_POST['request_Date_Start'];
    $end_date   = $_POST['request_Date_End'];
    $detail     = $_POST['internship_Detail'];

    $sql_main = "INSERT INTO internships_request (company_ID, request_Date_Start, request_Date_End, request_Date, status_ID, internship_Detail) 
                 VALUES (?, ?, ?, CURDATE(), 11, ?)";
    $stmt2 = $conn->prepare($sql_main);
    $stmt2->bind_param("isss", $last_company_id, $start_date, $end_date, $detail);
    $stmt2->execute();
    $last_request_id = $conn->insert_id;

    // --- ส่วนที่ 3: อัปเดตตารางนักเรียน ---
    $sql_std = "UPDATE student SET request_ID = ? WHERE stdnt_ID = ?";
    $stmt3 = $conn->prepare($sql_std);
    $stmt3->bind_param("is", $last_request_id, $student_id);
    $stmt3->execute();

    // ยืนยันการบันทึกทั้งหมด
    $conn->commit();
    
    // เปลี่ยนหน้าไปหน้าสำเร็จ 
    header("Location: success.php"); 
    exit();

} catch (Exception $e) {
    $conn->rollback();
    echo "ผิดพลาด: " . $e->getMessage();
}

$conn->close();
?>
