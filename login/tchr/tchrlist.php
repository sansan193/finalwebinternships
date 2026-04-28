<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Teacher') {
    header("Location: login.php");
    exit();
}
?>

<?php
include("../../db_connect.php");

$sql = "SELECT 
            s.stdnt_F_Name, 
            s.stdnt_L_Name, 
            c.company_Name, 
            r.request_Date_Start, 
            r.request_ID,
            r.status_ID,
            st.status_Name 
        FROM student s
        INNER JOIN internships_request r ON s.request_ID = r.request_ID
        INNER JOIN company c ON r.company_ID = c.company_ID
        INNER JOIN status st ON r.status_ID = st.status_ID
        ORDER BY r.request_Date DESC";
$result = $conn->query($sql);

function getStatusColor($status_ID) {
    switch ($status_ID) {
        case 11:
            return 'text-warning';
        case 22:
            return 'text-primary';
        case 33:
            return 'text-success';
        case 44:
            return 'text-primary';
        case 50:
            return 'text-primary';
        case 51:
            return 'text-success';
        case 52:
            return 'text-secondary';
        case 53:
            return 'text-primary';
        case 55:
            return 'text-success';
        case 99: 
            return "text-danger";
        default:
            return 'text-dark';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/stdntlist.css">
    <style>
    .text-truncate-custom {
    max-width: 100px; 
    white-space: nowrap;   
    overflow: hidden;      
    text-overflow: ellipsis; 
    }

    </style>
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card p-4 shadow">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="../tchr/tchr.php" class="btn btn-secondary">ย้อนกลับ</a>
            </div>
            <h1 class="text-center bg-dark text-white p-2 rounded">รายการคำขอจากนิสิต</h1>
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>สถานที่</th>
                        <th>วันที่เริ่ม</th>
                        <th>สถานะ</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['stdnt_F_Name']." ".$row['stdnt_L_Name']; ?></td>
                        <td><?php echo $row['company_Name']; ?></td>
                        <td><?php echo $row['request_Date_Start']; ?></td>
                        <td class="text-truncate-custom <?php echo getStatusColor($row['status_ID']); ?> ">
                            <?php echo $row['status_Name']; ?>                        
                        </td>
                        <td class="">
                            <a href="tchrdt.php?id=<?php echo $row['request_ID']; ?>" class="btn btn-sm btn-outline-primary text-truncate-custom rounded-pill px-2">
                                ดูรายละเอียด
                            </a>
                        </td>                    
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../../jsall/js/bootstrap.min.js"></script>
</body>
</html>
