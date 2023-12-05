<?php

declare(strict_types=1);

try {
    require_once 'mpQuery.php';

    $owner_id = isset($_POST['owner_id']) ? intval($_POST['owner_id']) : null;

    if(!$owner_id || $owner_id < 1){
        http_response_code(400);
        echo json_encode(array("status" => "error", "message" => "Invalid owner id"));
        exit();
    }

    $mysqlConnection = mysqli_connect(
        hostname: 'mysql8_test',
        username: 'user',
        password: 'password',
        database: 'servers'
    );

    if(!$mysqlConnection){
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Internal server error']);
        exit();
    }

    $query = "SELECT s.id as server_id, i.IP as ip, o.name as owner_name
          FROM servers s
          LEFT JOIN owners o ON s.owner = o.id
          LEFT JOIN ip i ON s.id = i.server_id
          WHERE o.id = ?";

    $result = m_pquery($mysqlConnection, $query, [$owner_id]);

    if($result === false){
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Internal server error']);
    } else {
        http_response_code(200);
        $response = [
            'status' => 'success',
            'data' => $result
        ];
        echo json_encode($response);
    }
    exit();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Internal server error']);
    exit();
}


