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

require_once __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer-master/src/SMTP.php';
require_once __DIR__ . '/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

        $stmt = $pdo->prepare("INSERT INTO orders (client_name, email, adress, delivery_time, payment_method, order_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['name'],
            $data['email'],
            $data['address'],
            $data['delivery_time'],
            $data['payment_method'],
            date('Y-m-d H:i:s')
        ]);
        
        // Получаем id только что созданного заказа
        $orderId = $pdo->lastInsertId();
        
        // Генерируем order_code один раз для всего заказа
        $orderCode = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
        
        // Заполняем таблицу order_items
        if (!empty($data['cart']) && is_array($data['cart'])) {
            foreach ($data['cart'] as $item) {
                $dishesId = isset($item['id']) ? $item['id'] : null;
                $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                if ($dishesId !== null) {
                    $stmtItem = $pdo->prepare("INSERT INTO order_items (order_id, dishes_id, quantity, order_code) VALUES (?, ?, ?, ?)");
                    $stmtItem->execute([
                        $orderId,
                        $dishesId,
                        $quantity,
                        $orderCode
                    ]);
                }
            }
        }
        
        // === ОТПРАВКА ПИСЬМА С ПОДТВЕРЖДЕНИЕМ ===
        // Формируем состав заказа для письма
        $orderDetails = '<h3>Состав заказа:</h3><table border="1" cellpadding="5" cellspacing="0"><tr><th>Блюдо</th><th>Количество</th></tr>';
        if (!empty($data['cart']) && is_array($data['cart'])) {
            foreach ($data['cart'] as $item) {
                $dishName = isset($item['name']) ? htmlspecialchars($item['name']) : 'Неизвестно';
                $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
                $orderDetails .= "<tr><td>{$dishName}</td><td>{$quantity}</td></tr>";
            }
        }
        $orderDetails .= '</table>';
        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'restaurant.smtp@gmail.com';
            $mail->Password = 'byvn woge eywa jklo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('restaurant.smtp@gmail.com', 'Ресторан "dmarhv"');
            $mail->addAddress($data['email'], $data['name']);

            $mail->isHTML(true);
            $mail->Subject = 'Подтверждение заказа';
            $mail->Body    = 'Спасибо за заказ! Ваш заказ принят и будет доставлен в ближайшее время.<br><br>' . $orderDetails;

            $mail->send();
        } catch (Exception $e) {
            error_log('Ошибка отправки письма: ' . $mail->ErrorInfo);
        }
        
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