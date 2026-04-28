<?php
session_start();
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "internships");

if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // --- ส่วนการเช็คแยกตามประเภท ---

    // 1. ถ้าขึ้นต้นด้วย TC (Teacher)
    if (str_starts_with($username, 'TC')) {
        $sql = "SELECT * FROM teacher WHERE tchr_ID = '$username' AND tchr_Password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['tchr_F_Name'];       // เก็บชื่ออาจารย์
            $_SESSION['surname'] = $row['tchr_L_Name']; // เก็บนามสกุลอาจารย์
            $_SESSION['role'] = "Teacher";
            header("Location: login/tchr/tchr.php");
            exit();
        }
    }

    // 2. ถ้าขึ้นต้นด้วย SF (Staff)
    elseif (str_starts_with($username, 'SF')) {
        $sql = "SELECT * FROM staff WHERE staff_ID = '$username' AND staff_Password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['staff_F_Name'];       // เก็บชื่อเจ้าหน้าที่
            $_SESSION['surname'] = $row['staff_L_Name']; // เก็บนามสกุลเจ้าหน้าที่
            $_SESSION['role'] = "Staff";
            header("Location: login/staff/staff.php");
            exit();
        }
    }

    // 3. ถ้าขึ้นต้นด้วย 67 (Student)
    elseif (preg_match('/^(65|66|67|68)/', $username)) {
        $sql = "SELECT * FROM student WHERE stdnt_ID = '$username' AND stdnt_Password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $row['stdnt_F_Name']; 
        $_SESSION['surname'] = $row['stdnt_L_Name'];
        $_SESSION['gpa'] = $row['stdnt_GPA'];
        $_SESSION['email'] = $row['stdnt_Email'];
        $_SESSION['year'] = $row['stdnt_Year'];
        $_SESSION['semester'] = $row['stdnt_Semester'];
        $_SESSION['AY'] = $row['stdnt_AY'];
        $_SESSION['phone'] = $row['stdnt_NumPhone'];
        $_SESSION['faculty'] = $row['stdnt_Fac'];
        $_SESSION['major'] = $row['stdnt_Major'];
        $_SESSION['role'] = "Student";
        header("Location: login/stdnt/stdnt.php");
        exit();
    }
}

    header("Location: login.php?error=1");
    exit();
}
?>
