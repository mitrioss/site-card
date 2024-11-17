<?php
// Specify the folder where the files will be uploaded
$uploadDir = 'uploads/';
// Checking if the file has been sent
if (isset($_FILES['file'])) {
 $file = $_FILES['file'];
 // Checking for errors
 if ($file['error'] !== UPLOAD_ERR_OK) {
 echo 'File upload error: ' . $file['error'];
 exit;
 }
 // File size limit (e.g. 5MB)
 $maxFileSize = 5 * 1024 * 1024; // 5 МБ в байтах
 if ($file['size'] > $maxFileSize) {
 echo 'The file is too big. Maximum size: 5 MB.';
 exit;
 }
 // Allowed MIME types (e.g. images, PDF, TXT)
 
$allowedTypes = [
    'image/jpeg',  // JPEG
    'image/png',   // PNG
    'image/gif',   // GIF
    'application/pdf',  // PDF
    'text/plain'   // TXT
];

// Checking the file type�йла
if (!in_array($file['type'], $allowedTypes)) {
    echo 'Invalid file type. Only JPEG, PNG, GIF, PDF, and TXT are allowed.';
    exit;
}

 // Generating a unique file name
 $fileName = uniqid() . '-' . basename($file['name']);
 $filePath = $uploadDir . $fileName;
 // Moving the file to the target folder
 if (move_uploaded_file($file['tmp_name'], $filePath)) {
 echo 'The file has been uploaded successfully: ' . htmlspecialchars($fileName);
 } else {
 echo 'An error occurred while saving the file.';
 }
} else {
 echo 'The file was not sent.';
}
?>
