<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$newToDo = $_POST;
$data = file_get_contents("data.json");
$data[] = $newToDo;

$encData = json_encode($data);
file_put_contents("data.json", $encData);
