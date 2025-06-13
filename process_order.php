<?php
// Отображение ошибок для отладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Подключение к БД
$host = 'localhost';
$dbname = 'restaurant';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    error_log("Ошибка подключения к БД: " . $e->getMessage());
    die(json_encode(['success' => false, 'message' => 'Ошибка подключения к базе данных: ' . $e->getMessage()]));
}

// POST-запрос
$rawData = file_get_contents('php://input');
error_log("Полученные данные: " . $rawData);

$data = json_decode($rawData, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("Ошибка декодирования JSON: " . json_last_error_msg());
    die(json_encode(['success' => false, 'message' => 'Ошибка обработки данных: ' . json_last_error_msg()]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $data) {
    try {
        // Проверяем наличие всех полей
        $requiredFields = ['name', 'email', 'address', 'delivery_time', 'payment_method'];
        $missingFields = [];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $missingFields[] = $field;
            }
        }
        
        if (!empty($missingFields)) {
            throw new Exception('Отсутствуют обязательные поля: ' . implode(', ', $missingFields));
        }

        $stmt = $pdo->prepare("INSERT INTO orders (client_name, email, adress, delivery_time, payment_method) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['name'],
            $data['email'],
            $data['address'],
            $data['delivery_time'],
            $data['payment_method']
        ]);
        
        echo json_encode([
            'success' => true, 
            'message' => 'Заказ успешно сохранен.'
        ]);
    } catch(Exception $e) {
        error_log("Ошибка сохранения заказа: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Ошибка сохранения заказа: ' . $e->getMessage()]);
    }
} else {
    error_log("Неверный метод запроса или отсутствуют данные");
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Неверный запрос или отсутствуют данные']);
}
?> 