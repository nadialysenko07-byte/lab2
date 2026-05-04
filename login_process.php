<?php
require_once 'auth.php';
header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!empty($data['username']) && !empty($data['password'])) {
    $username = trim($data['username']);
    $password = trim($data['password']);

    if (adminLogin($username, $password)) {
        echo json_encode(['success' => true]);
        exit;
    }
}

echo json_encode([
    'success' => false,
    'message' => 'Невірний логін або пароль.'
]);
