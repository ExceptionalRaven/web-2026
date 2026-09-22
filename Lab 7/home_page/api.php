<?php
// Устанавливаем заголовок, что мы работаем с JSON
header('Content-Type: application/json');

// 1. Проверяем, является ли метод запроса POST
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Только метод POST разрешен']);
    exit;
}

// 2. Получаем данные из тела запроса (JSON)
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

// Проверка на корректность JSON
if (!$data || !isset($data['image_name'], $data['image_data'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Неверный формат данных. Ожидаются image_name и image_data']);
    exit;
}

// 3. Декодируем base64 данные картинки
// Предполагаем, что данные приходят в формате base64
$imageData = base64_decode($data['image_data']);

// 4. Путь для сохранения (убедитесь, что папка static существует и доступна для записи)
$uploadDir = __DIR__ . '/static/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$filePath = $uploadDir . basename($data['image_name']);

// 5. Сохраняем файл
if (file_put_contents($filePath, $imageData)) {
    echo json_encode(['message' => 'Файл успешно сохранен', 'path' => $filePath]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Не удалось сохранить файл']);
}