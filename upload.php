<?php
// Указываем папку, куда будут загружаться файлы
$uploadDir = 'uploads';
// Проверяем, был ли отправлен файл
if (isset($_FILES['file'])) {
// Проверяем наличие ошибок
 if ($file['error'] !== UPLOAD_ERR_OK) {
 echo 'Ошибка загрузки файла: ' . $file['error'];
 exit;
 }
 // Ограничение на размер файла (например, 5MB)
 $maxFileSize = 5 * 1024 * 1024; // 5 МБ в байтах
 if ($file['size'] > $maxFileSize) {
 echo 'Файл слишком большой. Максимальный размер: 5MB.';
 exit;
 }
 // Разрешенные MIME-типы (например, изображения)
 $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
 if (!in_array($file['type'], $allowedTypes)) {
 echo 'Недопустимый тип файла. Разрешены только JPEG, PNG и GIF.';
 exit;
 }
 // Генерация уникального имени файла
 $fileName = uniqid() . '-' . basename($file['name']);
 $filePath = $uploadDir . $fileName;
 // Перемещаем файл в целевую папку
 if (move_uploaded_file($file['tmp_name'], $filePath)) {
 echo 'Файл успешно загружен: ' . htmlspecialchars($fileName);
 } else {
 echo 'Ошибка при сохранении файла.';
 }
} else {
 echo 'Файл не был отправлен.';
}
?>