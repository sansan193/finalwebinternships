<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Staff') {
    header("Location: login.php");
    exit();
}
?>

<?php
include("../../db_connect.php");

// 1. ดึงรายการที่รอเจ้าหน้าที่ตรวจสอบ (สถานะ 11)
$sql11 = "SELECT s.stdnt_F_Name, s.stdnt_L_Name, c.company_Name, r.request_Date_Start, r.request_ID, r.status_ID 
          FROM student s
          INNER JOIN internships_request r ON s.request_ID = r.request_ID
          INNER JOIN company c ON r.company_ID = c.company_ID
          WHERE r.status_ID = 11
          ORDER BY r.request_Date_Start DESC";
$result11 = $conn->query($sql11);

// 2. ดึงรายการที่อาจารย์อนุมัติแล้ว รอออกใบส่งตัว (สถานะ 33)
$sql33 = "SELECT s.stdnt_F_Name, s.stdnt_L_Name, c.company_Name, r.request_Date_Start, r.request_ID, r.status_ID 
          FROM student s
          INNER JOIN internships_request r ON s.request_ID = r.request_ID
          INNER JOIN company c ON r.company_ID = c.company_ID
          WHERE r.status_ID = 33
          ORDER BY r.request_Date_Start DESC";
$result33 = $conn->query($sql33);

// 3. ดึงรายการที่นิสิตแนบไฟล์จบฝึกงานแล้ว (สถานะ 52)
$sql52 = "SELECT s.stdnt_F_Name, s.stdnt_L_Name, c.company_Name, r.request_Date_Start, r.request_ID, r.status_ID 
          FROM student s
          INNER JOIN internships_request r ON s.request_ID = r.request_ID
          INNER JOIN company c ON r.company_ID = c.company_ID
          WHERE r.status_ID = 52
          ORDER BY r.request_Date_Start DESC";
$result52 = $conn->query($sql52);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/stdntlist.css">
</head>
<body>
    <div class="container my-5">
        <div class="card p-4 shadow border-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="../staff/staff.php" class="btn btn-secondary">ย้อนกลับ</a>
            </div>
            <h1 class="text-center bg-dark text-white p-3 rounded">รายการคำขอจากนิสิต (เจ้าหน้าที่)</h1>

            <!-- ส่วนที่ 1: รอรับเรื่อง -->
            <h3 class="mt-5 text-primary fw-bold">🔍 รายการรอตรวจสอบเบื้องต้น</h3>
            <table class="table table-hover mt-3">
                <thead class="table-primary">
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>สถานที่ฝึกงาน</th>
                        <th>วันที่เริ่ม</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result11->num_rows > 0): ?>
                        <?php while($row = $result11->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['stdnt_F_Name']." ".$row['stdnt_L_Name']; ?></td>
                            <td><?php echo $row['company_Name']; ?></td>
                            <td><?php echo $row['request_Date_Start']; ?></td>
                            <td><a href="stffdt.php?id=<?php echo $row['request_ID']; ?>" class="btn btn-sm btn-primary">ตรวจสอบ</a></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center text-muted">ไม่มีรายการรอตรวจสอบ</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <hr class="my-5">

            <!-- ส่วนที่ 2: รอออกใบส่งตัว -->
            <h3 class="text-success fw-bold">📄 รายการรอออกใบส่งตัว</h3>
            <table class="table table-hover mt-3">
                <thead class="table-success">
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>สถานที่ฝึกงาน</th>
                        <th>วันที่เริ่ม</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result33->num_rows > 0): ?>
                        <?php while($row = $result33->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['stdnt_F_Name']." ".$row['stdnt_L_Name']; ?></td>
                            <td><?php echo $row['company_Name']; ?></td>
                            <td><?php echo $row['request_Date_Start']; ?></td>
                            <td><a href="stffdt.php?id=<?php echo $row['request_ID']; ?>" class="btn btn-sm btn-success">แนบใบส่งตัว</a></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center text-muted">ไม่มีรายการรอออกใบส่งตัว</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <hr class="my-5">

            <!-- ส่วนที่ 3: รอตรวจสอบจบฝึกงาน  -->
            <h3 class="text-warning fw-bold">🎓 รายการรอตรวจสอบจบฝึกงาน</h3>
            <table class="table table-hover mt-3">
                <thead class="table-warning">
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>สถานที่ฝึกงาน</th>
                        <th>วันที่เริ่ม</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result52->num_rows > 0): ?>
                        <?php while($row = $result52->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['stdnt_F_Name']." ".$row['stdnt_L_Name']; ?></td>
                            <td><?php echo $row['company_Name']; ?></td>
                            <td><?php echo $row['request_Date_Start']; ?></td>
                            <td><a href="stffdt.php?id=<?php echo $row['request_ID']; ?>" class="btn btn-sm btn-warning">ตรวจสอบไฟล์</a></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center text-muted">ไม่มีรายการรอตรวจสอบจบฝึกงาน</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>
