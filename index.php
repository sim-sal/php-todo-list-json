<?php

header('Content-Type: application/json');

$toDoList = [
    [
        'fare la spesa',
    ],
    [
        'fare la doccia',
    ],
    [
        'fare passeggiata al cane',
    ],
];

echo json_encode($toDoList);
