<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IS at TK Park</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        /* บังคับใช้ฟอนต์ Kanit ทั้งเว็บ */
        * {
            font-family: 'Kanit', sans-serif !important;
        }

        body {
            background-color: #050505; /* พื้นหลังดำสนิท */
            color: #ffffff;
            min-height: 100vh;
            line-height: 1.6;
        }

        /* ปรับแต่งปุ่มย้อนกลับ */
        .btn-back {
            border-radius: 50px;
            padding: 8px 25px;
            transition: all 0.3s;
            border-color: #444;
            color: #fff;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #ffffff;
            color: #000000;
        }

        /* ปรับแต่งรูปภาพ */
        .activity-image-container img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border: 1px solid #333;
        }

        /* กล่องข้อมูลสถานที่ */
        .location-box {
            background-color: #1a1a1a;
            border-left: 4px solid #ffc107; /* เส้นสีเหลืองเน้นด้านข้าง */
        }

        /* หัวข้อกิจกรรม */
        h1 {
            font-size: 2.5rem;
            background: linear-gradient(to right, #fff, #ccc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .date-text {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="mb-4">
            <a href="javascript:history.back()" class="btn btn-outline-light btn-back">
                ← ย้อนกลับ
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="activity-image-container mb-4">
                    <img src="../pic/activpj2.jpg" alt="IS TK Park" class="img-fluid rounded-4 shadow-lg">
                </div>

                <div class="activity-content">
                    <h1 class="fw-bold mb-3"></h1>
                    
                    <div class="d-flex align-items-center text-secondary mb-4">
                        <span class="badge bg-danger me-3">กิจกรรมแนะนำ</span>
                        <span class="date-text">📅 24- 25 กรกฎาคม 2568</span>
                    </div>

                    <div class="description-section">
                        <p class="lead text-light mb-4">
                            หลักสูตรศิลปศาสตรบัณฑิต สาขาวิชาสารสนเทศศึกษา ได้จัดโครงการพัฒนาแหล่งเรียนรู้สู่ชุมชน ณ โรงเรียนวัดวังปลาจีด จ.นครนายก 
                            และโรงเรียนวัดท่าช้าง (แสงปัญญาวิทยาคาร) จ.นครนายก เพื่อให้นิสิตได้บูรณาการวิชาชีพสารสนเทศ กับการจัดแหล่งเรียนรู้ 
                            ที่มีประโยชน์ตรงตามความต้องการของชุมชน และมีทักษะทางปัญญา ทักษะชีวิต และทักษะวิชาชีพเพิ่มขึ้น🎤
                        </p>

                        <div class="location-box p-4 rounded-3 mb-4">
                            <h5 class="text-warning mb-2">📍 สถานที่</h5>
                            <p class="mb-0 text-white-50">
                                ณ โรงเรียนวัดวังปลาจีด จ.นครนายก 
                                
                                และโรงเรียนวัดท่าช้าง (แสงปัญญาวิทยาคาร) จ.นครนายก
                            </p>
                        </div>
                    </div>

                    <hr class="my-5 border-secondary">
                </div>
            </div>
        </div>
    </div>

</body>
</html>