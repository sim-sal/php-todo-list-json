<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$toDoList = [
    [
        'do' => 'fare la spesa',
    ],
    [
        'do' => 'fare la doccia',
    ],
    [
        'do' => 'fare passeggiata al cane',
    ],
];

echo json_encode($toDoList);
