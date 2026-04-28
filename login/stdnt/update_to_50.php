<?php
include("../../db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_id = $_POST['request_id'];

    // อัปเดตเฉพาะรายการที่มีสถานะเป็น 44 ให้กลายเป็น 50
    $sql = "UPDATE internships_request SET status_ID = 50 WHERE request_ID = ? AND status_ID = 44";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
}
$conn->close();
?>
