<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คณาจารย์หลักสูตรสารสนเทศศึกษา</title>
    <link rel="stylesheet" href="cssall/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Sarabun', sans-serif; }
        .header-section { margin-top: 30px; margin-bottom: 40px; }
        .title-red { color: #d9534f; font-weight: bold; font-size: 2.5rem; }
        .subtitle { font-weight: bold; font-size: 1.5rem; }
        
        /* สไตล์การ์ด */
        .faculty-card {
            background-color: #e9ecef;
            border-radius: 20px;
            padding: 30px 15px;
            text-align: center;
            height: 100%;
            border: none;
            transition: transform 0.2s;
        }
        .faculty-card:hover { transform: translateY(-5px); }

        /* วงกลมล้อมรอบรูป */
        .image-container {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            border: 5px solid #fff;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .image-container img { width: 100%; height: 100%; object-fit: cover; }

        .name { font-weight: bold; color: #333; margin-bottom: 5px; }
        .position { color: #d9534f; font-size: 0.9rem; margin-bottom: 15px; }
        .contact-info { font-size: 0.9rem; color: #007bff; font-weight: bold; }
        .contact-info div { margin-bottom: 2px; }
    </style>
</head>
<body>
    <a href="index.php" class="btn btn-outline-dark position-fixed top-0 start-0 m-3 z-3 shadow-sm" style="border-radius: 50px;">
        <i class="bi bi-chevron-left"></i> ย้อนกลับ
    </a>

    <div class="container text-center">
        <!-- ส่วนหัว -->
        <div class="header-section">
            <h1 class="title-red">คณาจารย์</h1>
            <h2 class="subtitle">หลักสูตรศิลปศาสตรบัณฑิต สาขาวิชาสารสนเทศศึกษา</h2>
        </div>

        <!-- แถวที่ 1: 2 คอลัมน์ (กึ่งกลาง) -->
        <div class="row justify-content-center g-4 mb-4">
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/dit.JPG" alt="อาจารย์"></div>
                    <div class="name">อ.ดร.ดิษฐ์ สุทธิวงศ์</div>
                    <div class="position">ประธานหลักสูตร</div>
                    <div class="contact-info">
                        <div>081-5550581</div>
                        <div>dit@g.swu.ac.th</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/thiti.JPG" alt="อาจารย์"></div>
                    <div class="name">อ.ดร.ฐิติ อติชาติชยากร</div>
                    <div class="position">เลขานุการหลักสูตร</div>
                    <div class="contact-info">
                        <div>02-649-5000 ต่อ 16087</div>
                        <div>thitik@g.swu.ac.th</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- แถวที่ 2 และ 3: 3 คอลัมน์ -->
        <div class="row g-4 mb-4">
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/wipa.JPG" alt="อาจารย์"></div>
                    <div class="name">ผศ.ดร.วิภากร วัฒนสินธุ์ </div>
                    <div class="position">อาจารย์ประจำหลักสูตร</div>
                    <div class="contact-info">
                        <div>02-649-5000 ต่อ 16508</div>
                        <div>vipakorn@g.swu.ac.th</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/choti.JPG" alt="อาจารย์"></div>
                    <div class="name">อ.โชติมา วัฒนะ</div>
                    <div class="position">อาจารย์ประจำหลักสูตรหลักสูตร</div>
                    <div class="contact-info">
                        <div>02-649-5000</div>
                        <div>chotimaw@g.swu.ac.th</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/chok.JPG" alt="อาจารย์"></div>
                    <div class="name">อ.ดร.โชคธำรงค์ จงจอหอ</div>
                    <div class="position">อาจารย์ประจำหลักสูตร</div>
                    <div class="contact-info">
                        <div>02-649-5000 ต่อ 16292</div>
                        <div>chokthamrong@g.swu.ac.th</div>
                    </div>
                </div>
            </div>

        <div class="row g-4 mb-4">
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/dut.JPG" alt="อาจารย์"></div>
                    <div class="name">ผศ.ดร.ดุษฎี สีวังคำ</div>
                    <div class="position">อาจารย์ประจำหลักสูตร</div>
                    <div class="contact-info">
                        <div>02-649-5000 ต่อ 16292</div>
                        <div>dussadee@g.swu.ac.th</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/suma.JPG" alt="อาจารย์"></div>
                    <div class="name">อ.ดร.ศุมรรษตรา แสนวา</div>
                    <div class="position">อาจารย์ประจำหลักสูตร</div>
                    <div class="contact-info">
                        <div>085-617-9617</div>
                        <div>sumattra@g.swu.ac.th</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="faculty-card">
                    <div class="image-container"><img src="pic/tchr/sasi.JPG" alt="อาจารย์"></div>
                    <div class="name">ผศ.ดร.ศศิพิมล ประมินพงศกร</div>
                    <div class="position">อาจารย์ประจำหลักสูตร</div>
                    <div class="contact-info">
                        <div>02-649-5000</div>
                        <div>sasipimol@g.swu.ac.th</div></div>
                </div>
            </div>

        </div>
    </div>
    <script src="jsall/js/bootstrap.min.js"></script>
</body>
</html>
