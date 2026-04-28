<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หลักสูตรสาขาวิชาสารสนเทศศึกษา</title>
    <link rel="stylesheet" href="cssall/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        .header-section { padding: 50px 20px; text-align: center; background: white; }
        .header-section h1 { color: #d9534f; font-weight: bold; font-size: 2.5rem; }
        .btn-back { background: #ccc; border-radius: 20px; padding: 5px 20px; border: none; font-size: 0.9rem; }
        
        /* (ป.ตรี) */
        .card-undergrad {
            background: #9c1212;
            border-radius: 50px ;
            padding: 40px;
            min-height: 450px;
            box-shadow: 0 -10px 20px rgba(0,0,0,0.05);
        }
        /* (บัณฑิตศึกษา) */
        .card-grad {
            background: #1a1a1a;
            color: white;
            border-radius: 50px ;
            padding: 40px;
            min-height: 450px;
        }

        .level-title { font-size: 1.8rem; font-weight: bold; margin-bottom: 30px; text-align: center; }
        .pdf-item { display: flex; align-items: center; justify-content: space-between; margin-bottom: 25px; }
        .pdf-text { font-size: 1rem; line-height: 1.2; }
        .pdf-year { color: #d9534f; font-weight: bold; margin: 0 15px; }
        .pdf-icon { width: 50px; height: 50px; background: #d9534f; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.8rem; text-decoration: none; transition: 0.3s; }
        .pdf-icon:hover { background: #b32d2d; color: white; transform: scale(1.1); }
    </style>
</head>
<body>
    <div class="header-section">
        <div class="container text-start mb-4">
            <button class="btn-back" onclick="history.back()">ย้อนกลับ</button>
        </div>
        <h1>หลักสูตรสาขา<br>วิชาสารสนเทศศึกษา</h1>
        <div class="container">
            <p class="mt-4 mx-auto" style="max-width: 800px; font-weight: 500;">
                หลักสูตรด้านการพัฒนาการจัดการข้อมูลสารสนเทศอย่างเป็นระบบ<br>
                โดยการนำเทคโนโลยีสารสนเทศสมัยใหม่มาประยุกต์ใช้ในการ<br>
                ออกแบบโครงสร้างข้อมูลให้ตอบโจทย์กับ พฤติกรรมผู้ใช้งาน
            </p>
        </div>
    </div>

    <div class="container-fluid p-4">
        <!-- ใช้ row-cols-1  และ row-cols-md-2 -->
        <div class="row g-0">
            <!-- ระดับปริญญาตรี -->
            <div class="col-12 col-md-6">
                <div class="card-undergrad h-100">
                    <h2 class="level-title text-white">ระดับปริญญาตรี</h2>
                    
                    <!-- รายการ PDF -->
                    <div class="pdf-item">
                        <div class="pdf-text text-white">หลักสูตรศิลปศาสตรบัณฑิต<br>สาขาวิชาสารสนเทศศึกษา</div>
                        <div class="pdf-year text-dark">1/2565</div>
                        <a href="curri/ISFile2565.pdf" class="pdf-icon">PDF</a>
                    </div>

                    <div class="pdf-item">
                        <div class="pdf-text text-white">หลักสูตรศิลปศาสตรบัณฑิต<br>สาขาวิชาสารสนเทศศึกษา</div>
                        <div class="pdf-year text-dark">1/2560</div>
                        <a href="curri/ISFile2560.pdf" class="pdf-icon">PDF</a>
                    </div>

                    <div class="pdf-item">
                        <div class="pdf-text text-white">หลักสูตรศิลปศาสตรบัณฑิต<br>สาขาวิชาสารสนเทศศึกษา</div>
                        <div class="pdf-year text-dark">1/2555</div>
                        <a href="curri/ISFile2555.pdf" class="pdf-icon">PDF</a>
                    </div>            
                </div>
            </div>

            <!-- ระดับบัณฑิตศึกษา -->
            <div class="col-12 col-md-6">
                <div class="card-grad h-100">
                    <h2 class="level-title">ระดับบัณฑิตศึกษา</h2>

                    <div class="pdf-item">
                        <div class="pdf-text">หลักสูตรศิลปศาสตรมหาบัณฑิต<br>สาขาวิชาสารสนเทศศึกษา</div>
                        <div class="pdf-year">1/2565</div>
                        <a href="curri/Bundit2565.pdf" class="pdf-icon">PDF</a>
                    </div>

                    <div class="pdf-item">
                        <div class="pdf-text">หลักสูตรศิลปศาสตรมหาบัณฑิต<br>สาขาวิชาสารสนเทศศึกษา<br> (หลักสูตรปรับปรุง พ.ศ. 2560)</div>
                        <div class="pdf-year">1/2560</div>
                        <a href="curri/Bundit2560.pdf" class="pdf-icon">PDF</a>
                    </div>
                    
                    <div class="pdf-item">
                        <div class="pdf-text">หลักสูตรศิลปศาสตรมหาบัณฑิต<br>สาขาวิชาสารสนเทศศึกษา<br> (หลักสูตรปรับปรุง พ.ศ. 2555)</div>
                        <div class="pdf-year">1/2555</div>
                        <a href="curri/Bundit2555.pdf" class="pdf-icon">PDF</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="../../jsall/js/bootstrap.min.js"></script>
</body>
</html>
