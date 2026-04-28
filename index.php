<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="cssall/css/bootstrap.min.css">
    <link rel="stylesheet" href="cssall/style.css">
</head>
<body>

    <!-- navbar -->
    <nav class="navbar">
        <!-- nav ซ้าย -->
        <div class="nav-left">
            <a href="#home">
                <img src="pic/swulg.PNG" alt="" class="nav-logo">
                <img src="pic/hmis2.PNG" alt="" class="nav-logo">
            </a>
        </div>        
        
        <!-- nav ขวา -->
        <div class="nav-right">
            <a href="#highlight">ไฮไลท์</a>
            <a href="#courses">หลักสูตร</a>
            <a href="#actv">กิจกรรม</a>
            <a href="student.php">นิสิต</a>
            <a href="teacher.php">อาจารย์</a>
            <a href="#contect">ติดต่อ</a>
            <div class="box-login-top ">
                <a href="login.php" class="login-top">เข้าสู่ระบบ</a>
            </div>
        </div>
    </nav>

    <!-- header -->
    <header class="header-container container-fluid d-flex flex-column align-items-center justify-content-center text-center" id="home"> 
        <div class="object mt-5">
            <img src="pic/swu33.png" alt="SWU Logo" class="img-fluid">
        </div>

        <!-- ส่วนข้อความ -->
        <div class="">
            <h2 class="sub-title text-light reveal">HUMANITIES</h2>
            <div class="object text-content mt-4">
                <h1 class="main-title display-3 fw-bold text-dark">INFORMATION STUDY</h1>
            </div>
        </div>

        <!-- ส่วนปุ่ม Login -->
        <div class="login-section mt-4">
            <a href="login.php" class="login-btn btn-danger btn-lg px-5 rounded-pill shadow-sm">LOG IN</a>
            <p class="footer-note mt-3 text-light small">สำหรับ นิสิต และบุคลากร</p>
        </div>
    </header>

    <!--   -->
    <section class="highlight-section" id="highlight">
        <div class="highlight-container">
            <div class="highlight-content">
                <!-- ส่วนข้อความ -->
                <div class="text-area">
                    <h1 class="highlight-title text-content-h reveal">ไฮไลท์ของสาขา</h1>
                </div>
                
                
                <div class="image-area">
                    <img src="pic/nlk2.PNG" alt="Highlight Image">
                </div>
            </div>
        </div>
    </section>

    <section class="hero-section" id="courses">
        <div class="hero-content">
            <h3 class="sub-title reveal">หลักสูตรศิลปศาสตร์</h3>
            <h1 class="main-title2 reveal">สารสนเทศศึกษา</h1>
            <p class="degree-info reveal">ระดับปริญญาตรี  |  ระดับบัณฑิตศึกษา</p>
            <a href="curriculum.php" class="btn-detail reveal">รายละเอียด</a>
        </div>
    </section>

    <!-- ไฮไลท์ บรรณารักษ์ศาตร์ -->
   <section class="lib-section">
        <div class="lib-content reveal">
            <h3 class="lib-title text-content ">บรรณารักษ์ศาสตร์</h3>
        </div>
    </section>

    <section class="lib2-section reveal" >
        <div class="lib2-content">
            <h1 class="lib2-title reveal">เรียนรู้การจัดระบบสารสนเทศตาม
                <br>หลักเกณฑ์มาตรฐานสากล</h1>
            <div class="lib2-info-container reveal">
                <p class="lib2-info reveal"> 
                    การทำรายการทรัพยากรสารสนเทศ <br>
                    การวิเคราะห์เนื้อหากำหนดเลขหมู่ <br>
                    การจัดระบบทรัพยากรสารสนเทศประเภทต่าง ๆ
                </p>
            </div>
        </div>
    </section>

    <!-- ไฮไลท์ เทคโนโลยี -->
   <section class="tec-section" >
        <div class="tec-content reveal">
            <h3 class="tec-title text-content ">เทคโนโลยี</h3>
        </div>
    </section>

    <section class="tec2-section" >
        <div class="tec2-content">
            <h1 class="tec2-title reveal">พัฒนาและออกแบบโปรแกรม </h1>
        </div>
    </section>
    
    <section class="tecdb-section" >
        <div class="tecdb-content">
            <div class="tecdb-info-container reveal">
                <p class="tecdb-info reveal"> 
                    วิเคราะห์การพัฒนาฐานข้อมูลโครงสร้างฐานข้อมูล
                </p>
            </div>
        </div>
    </section>

    <section class="tecphp-section">
        <div class="tecpphp-content">
            <div class="tecphp-info-container reveal">
                <p class="tecphp-info reveal"> 
                    เชื่อมต่อโปรแกรมและข้อมูล<br> 
                    ประยุกต์การใช้งานโปรแกรมและ<br>
                    พัฒนาระบบสารสนเทศเพื่อการจัดการในองค์กร
                </p>
            </div>
        </div>
    </section>




    <section class="activity-section" id="actv">
        <h2 class="activity-title reveal">กิจกรรมภายใน ประชาสัมพันธ์</h2>
        
        <div class="activity-wrapper">
            <div class="activity-content">

                <!-- กล่องที่ 1 -->
                <a href="activ/activ1.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/isopenh2.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรม Open House</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 2 -->
                <a href="activ/activ2.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/issport3.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรมอบรมสานสัมพันธ์</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 3 -->

                <a href="activ/activ3.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/hgrsr2.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรมจิตอาสาเพื่อเด็ก</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 4 -->

                <a href="activ/activ4.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/tkpark2.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรมแลกเปลี่ยนความรู้</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 5 -->
               <a href="activ/activ5.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/activpj.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>โครงการพัฒนาแหล่งเรียนรู้สู่ชุมชน</h3>
                        </div>       
                    </div>
                </a>

                  <!-- กล่องที่ 1 -->
                <a href="activ/activ1.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/isopenh2.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรม Open House</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 2 -->
                <a href="activ/activ2.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/issport3.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรมอบรมสานสัมพันธ์</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 3 -->

                <a href="activ/activ3.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/hgrsr2.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรมจิตอาสาเพื่อเด็ก</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 4 -->

                <a href="activ/activ4.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/tkpark2.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>กิจกรรมแลกเปลี่ยนความรู้</h3>
                        </div>       
                    </div>
                </a>

                <!-- กล่องที่ 5 -->
               <a href="activ/activ5.php" class="activity-card reveal">
                    <div class="activity-img">
                        <img src="pic/activpj.jpg" alt="isopenhouse">
                        <div class="hover-overlay">
                            <span class="hover-btn">เยี่ยมชม</span>
                        </div>
                        <div class="activity-info">
                            <h3>โครงการพัฒนาแหล่งเรียนรู้สู่ชุมชน</h3>
                        </div>       
                    </div>
                </a>

            </div>
        </div>
    </section>

    <section class="name-list-section" id="contect">
        <div class="member-header reveal">
            <h1 class="member-text">กลุ่ม โค้ดจะเริ่ด</h1>
        </div>
        <div class="member-list">
            <!-- ใช้ row-cols-1 และ row-cols-md-2 เพื่อแบ่งคอลัมน์ -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="name-box col reveal">
                    <div class="name-item">พิมพ์ชนก เชื้อรื่น </div>
                    <div class="ID-item">67101010131</div>
                </div>
                <div class="name-box col reveal">
                    <div class="name-item">อาทิยา บี ที อัสลัน </div>
                    <div class="ID-item">67101010133</div>
                </div>
                <div class="name-box col reveal">
                    <div class="name-item">ฉันชนก ภู่สมบูรณ์วัฒนา </div>
                    <div class="ID-item">67101010615</div>
                </div>
                <div class="name-box col reveal">
                    <div class="name-item">ชญานิศ ภูธรฤทธิ์ </div>
                    <div class="ID-item">67101010616</div>
                </div>
                <div class="name-box col reveal">
                    <div class="name-item">ปาณิศา บำรุงอินทร์ </div>
                    <div class="ID-item">67101010633</div>
                </div>
                <div class="name-box col reveal">
                    <div class="name-item">พราวฟ้า มาประจวบ </div>
                    <div class="ID-item">67101010635</div>
                </div>
                <div class="name-box col reveal">
                    <div class="name-item">พิสุทธ ชื่นสดใจ </div>
                    <div class="ID-item">67101010637</div>
                </div>
            </div>
        </div>
        <div class="footer-image">
            <img src="pic/footer.png" alt="">
        </div>
    </section>

    <footer class="footer">
        <hr class="footer-divider">
        <div class="contect">
            <p>copyright 2026 © student from Information Study</p>
        </div>
    </footer>


    <script src="jsall/script.js"></script>
    <script src="jsall/js/bootstrap.min.js"></script>
</body>
</html>