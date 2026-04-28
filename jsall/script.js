window.addEventListener('scroll', () => {
    const scrollValue = window.scrollY;
    
    const img = document.querySelector('.object img');
    const text = document.querySelector('.text-content');

    // 1. จัดการการขยาย (เฉพาะรูปภาพ)
    let scale = 1 + (scrollValue * 0.001);
    scale = Math.min(Math.max(scale, 1), 3.5);

    if (img) {
        img.style.transform = `scale(${scale})`;
    }

    // 2. จัดการการเปลี่ยนสีตัวอักษร (เหลืองไล่ขาว -> เหลืองไล่แดง)
    if (text) {
        // คำนวณค่าจาก 255 (ขาว) ลดลงไปหา 0 (แดง) ตามการเลื่อน
        let dynamicColor = Math.max(255 - (scrollValue * 0.4), 0);
        let dynamicColor2 = Math.max(0 + (scrollValue * 0.4), 0); // เข้ม ไป อ่อน

        
        // ใช้ Linear Gradient เพื่อไล่สี
        text.style.backgroundImage = `linear-gradient(to right, rgb(${dynamicColor2},${dynamicColor},${dynamicColor}), rgb(${dynamicColor2}, ${dynamicColor2}, ${dynamicColor}))`;
        
        // ลบการสั่ง scale ของตัวอักษรออกเพื่อให้ขนาดคงที่
        text.style.transform = 'none'; 
    }
});

window.addEventListener('scroll', () => {
    const scrollValue = window.scrollY;
    
    const text = document.querySelector('.text-content-h');



    // 2. จัดการการเปลี่ยนสีตัวอักษร (เหลืองไล่ขาว -> เหลืองไล่แดง)
    if (text) {
        // คำนวณค่าจาก 255 (ขาว) ลดลงไปหา 0 (แดง) ตามการเลื่อน
        let dynamicColor = Math.max(255 - (scrollValue * 0.2), 0);//มืด ไปเข้ม 
        let dynamicColor2 = Math.max(0 + (scrollValue * 0.2), 0); // เข้ม ไป อ่อน
        
        // ใช้ Linear Gradient เพื่อไล่สี
        text.style.backgroundImage = `linear-gradient(to right, rgb(${dynamicColor2},${dynamicColor},${dynamicColor2}), rgb(${dynamicColor},${dynamicColor2}, ${dynamicColor2}))`;
        
        // ลบการสั่ง scale ของตัวอักษรออกเพื่อให้ขนาดคงที่
        text.style.transform = 'none'; 
    }
});


const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active'); // เมื่อเห็น Element ให้เติมคลาส active
        }
    });
}, { threshold: 0.2 }); // ทำงานเมื่อเห็น Element ไปแล้ว 20%

// สั่งให้ติดตามทุก Class ที่มีคำว่า .reveal
document.querySelectorAll('.reveal').forEach((el) => observer.observe(el));