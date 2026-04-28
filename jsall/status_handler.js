// status_handler.js
function updateStatusTo50(requestId) {
    // ใช้ Fetch API เพื่อส่งข้อมูลไปอัปเดตสถานะที่ฝั่ง Server
    fetch('update_to_50.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'request_id=' + requestId
    })
    .then(response => {
        if (response.ok) {
            console.log('อัปเดตสถานะสำเร็จ');
            // เลือกเปิดใช้งานบรรทัดล่างนี้ หากต้องการให้หน้าจอ Refresh เพื่อแสดงสถานะใหม่ทันที
            // location.reload(); 
        }
    })
    .catch(error => {
        console.error('เกิดข้อผิดพลาด:', error);
    });
}

// เพิ่มต่อจากฟังก์ชัน updateStatusTo50 เดิม
function uploadAndFinish() {
    const form = document.getElementById('uploadFinishForm');
    const fileInput = document.getElementById('finish_doc');

    if (fileInput.files.length === 0) {
        alert("กรุณาเลือกไฟล์เอกสารก่อนกดส่ง");
        return;
    }

    const formData = new FormData(form);

    // ส่งข้อมูลไปยังไฟล์ประมวลผล
    fetch('upload_finish_doc.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            alert('อัปโหลดเอกสารและอัปเดตสถานะสำเร็จ!');
            location.reload(); // รีเฟรชเพื่อแสดงสถานะ 52
        } else {
            alert('เกิดข้อผิดพลาด: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('ไม่สามารถอัปโหลดได้');
    });
}

