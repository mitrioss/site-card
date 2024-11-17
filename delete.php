<?php
$uploadDir = 'uploads/';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['file'])) {
    $fileName = basename($_POST['file']); // Обработка имени файла для безопасности
    $filePath = $uploadDir . $fileName;

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo 'success';
        } else {
            echo 'Ошибка удаления файла.';
        }
    } else {
        echo 'Файл не найден.';
    }
}
?>
