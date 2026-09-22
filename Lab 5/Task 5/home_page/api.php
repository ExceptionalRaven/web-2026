<?php
// Устанавливаем заголовок, что мы работаем с JSON
header('Content-Type: application/json');

// Является ли метод запроса POST
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Только метод POST разрешен']);
    exit;
}

// Получаем данные из тела запроса
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

// Проверка на корректность JSON
if (!$data || !isset($data['image_name'], $data['image_data'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Неверный формат данных. Ожидаются image_name и image_data']);
    exit;
}

// Декодируем base64 данные картинки
$imageData = base64_decode($data['image_data']);

// Путь для сохранения
$uploadDir = __DIR__ . '/static/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$filePath = $uploadDir . basename($data['image_name']);

// Сохраняем файл
if (file_put_contents($filePath, $imageData)) {
    echo json_encode(['message' => 'Файл успешно сохранен', 'path' => $filePath]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Не удалось сохранить файл']);
}