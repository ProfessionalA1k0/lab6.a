<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['dropdowns'])) {
        $filePath = 'dropdowns.json';
        file_put_contents($filePath, json_encode($input['dropdowns'], JSON_PRETTY_PRINT));
        echo json_encode(['message' => 'Дані успішно збережено у файл!']);
    } else {
        echo json_encode(['message' => 'Дані відсутні.']);
    }
} else {
    echo json_encode(['message' => 'Невірний метод запиту.']);
}
?>