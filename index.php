<?php

$type = $_SERVER['REQUEST_METHOD'];

// if type is GET, POST, PUT, DELETE copy the relevant array to $data
switch ($type) {
    case 'GET':
        $data = $_GET;
        break;
    case 'POST':
        $data = $_POST;
        break;
    case 'PUT':
        parse_str(file_get_contents('php://input'), $data);
        break;
    case 'DELETE':
        $data = $_DELETE;
        break;
}

// write the data array to a text file named with the current readable time
$file = fopen('logs/'. $type . date('Y-m-d-H.i.s') . '.txt', 'w');
fwrite($file, print_r($data, true));
fclose($file);

echo "success";