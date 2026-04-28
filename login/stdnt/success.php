<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลสำเร็จ</title>
    <link rel="stylesheet" href="../../cssall/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Sarabun', sans-serif; 
        }
        .success-card {
            text-align: center;
            max-width: 500px;
        }
        .main-text {
            font-size: 3.5rem;
            font-weight: 900; 
            color: #333;
            margin-bottom: 3rem;
        }
        .btn-custom-red {
            background-color: #8B1A00;
            color: white;
            border-radius: 50px;
            padding: 10px 40px;
            font-size: 1.1rem;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
            border: none;
        }
        .btn-custom-red:hover {
            background-color: #6d1400;
            color: #fff;
            transform: scale(1.05);
        }
        .link-home {
            display: block;
            margin-top: 1.5rem;
            color: #666;
            text-decoration: underline;
            font-size: 1rem;
        }
    </style>
</head>
<body>

    <div class="success-card">
        <!-- ข้อความหลัก -->
        <h1 class="main-text">บันทึกข้อมูลสำเร็จ</h1>

        <!-- ปุ่มย้อนกลับ -->
        <div class="mt-4">
            <a href="stdnt.php" class="btn-custom-red">ย้อนกลับ</a>
        </div>

        <!-- ลิงก์กลับหน้าหลัก -->
        <a href="../../index.php" class="link-home">กลับสู่หน้าหลัก</a>
    </div>
    <script src="../../jsall/js/bootstrap.min.js"></script>
</body>
</html>
