<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Teacher') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../cssall/dashboard.css"> 
</head>
<body>
    <div class="container mt-5">
        <div class="card profile-card p-5 text-center">
            <h5 class="role-badge mb-3">อาจารย์ประจำคณะ</h5>
            <h1 class="user-name fw-bold">
                <?php echo $_SESSION['name'] . " " . $_SESSION['surname']; ?>
            </h1>
            <p class="user-id">ID: <?php echo $_SESSION['username']; ?></p>
            
            <div class="btn-action-group">
                <a href="tchrlist.php" class="btn btn-list btn-custom shadow-sm">ดูรายการคำขอนิสิต</a>
                <a href="../../index.php" class="btn btn-logout btn-custom">ออกจากระบบ</a>
            </div>
        </div>
    </div>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>
