<?php
// ตรวจสอบว่าไฟล์ถูกอัปโหลดหรือไม่
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // กำหนดที่เก็บไฟล์ (เซิร์ฟเวอร์ Vercel ไม่สามารถเก็บไฟล์ถาวรได้ แต่เราสามารถเก็บไว้ใน tmp directory ชั่วคราว)
    $upload_dir = sys_get_temp_dir();
    $upload_path = $upload_dir . "/" . basename($file["name"]);

    // อัปโหลดไฟล์
    if (move_uploaded_file($file["tmp_name"], $upload_path)) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded.";
}
?>
