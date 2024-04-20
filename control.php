<?php
    $json_data = file_get_contents("data.json");
    $data = json_decode($json_data, true);
    if($_SERVER["REQUEST_URI"] === "/web"){

        header('Content-Type: application/json');
        echo json_encode($data);
    }
?>