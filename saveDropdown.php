<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!empty($data['title']) && !empty($data['items'])) {
        $filename = 'dropdowns.json';
        $dropdowns = file_exists($filename) ? json_decode(file_get_contents($filename), true) : [];

        $dropdowns[] = $data;
        file_put_contents($filename, json_encode($dropdowns, JSON_PRETTY_PRINT));

        echo json_encode(['message' => 'Меню успішно збережено!']);
    } else {
        echo json_encode(['message' => 'Некоректні дані!']);
    }
}
?>
