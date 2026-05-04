<?php
require_once 'subscription_functions.php';

header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['email']) && !empty($data['email'])) {
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Некоректний формат email']);
        exit;
    }

    if (saveSubscription($email)) {
        echo json_encode(['status' => 'success', 'message' => 'Підписка оформлена!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Помилка запису на сервері']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Email не вказано']);
}
?>