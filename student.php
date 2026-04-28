<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถิตินิสิตปัจจุบัน</title>
   
    <link href="cssall/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .stat-card {
            background-color: #6c757d; 
            border-radius: 40px;
            padding: 20px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .stat-header {
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .stat-body {
            background-color: #343a40; 
            border-radius: 30px;
            padding: 40px 30px;
        }
        .stat-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        .stat-label {
            font-weight: 400;
        }
        .stat-value {
            color: #ff6b6b; 
            font-weight: 600;
            flex-grow: 1;
            text-align: center;
        }
        .stat-unit {
            font-weight: 400;
        }
    </style>
</head>
<body>
<a href="index.php" class="btn btn-outline-dark position-fixed top-0 start-0 m-3 z-3 shadow-sm" style="border-radius: 50px;">
    <i class="bi bi-chevron-left"></i> ย้อนกลับ
</a>

    <div class="stat-card">
        <div class="stat-header">
            นิสิตปัจจุบัน 2 / 2568
        </div>
        <div class="stat-body">
            <!-- ชั้นปีที่ 1 -->
            <div class="stat-row">
                <span class="stat-label">ชั้นปีที่ 1</span>
                <span class="stat-value">120</span>
                <span class="stat-unit">คน</span>
            </div>
            <!-- ชั้นปีที่ 2 -->
            <div class="stat-row">
                <span class="stat-label">ชั้นปีที่ 2</span>
                <span class="stat-value">120</span>
                <span class="stat-unit">คน</span>
            </div>
            <!-- ชั้นปีที่ 3 -->
            <div class="stat-row">
                <span class="stat-label">ชั้นปีที่ 3</span>
                <span class="stat-value">90</span>
                <span class="stat-unit">คน</span>
            </div>
            <!-- ชั้นปีที่ 4 -->
            <div class="stat-row">
                <span class="stat-label">ชั้นปีที่ 4</span>
                <span class="stat-value">85</span>
                <span class="stat-unit">คน</span>
            </div>
        </div>
    </div>

<script src="cssall/js/bootstrap.bundle.min.js"></script>
</body>
</html>
