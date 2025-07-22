<?php
require_once "connection.php"; // adjust this if your DB connection file has a different path

try {
    $stmt = $conn->query("SELECT id, owner_name, pet_name, gender, age FROM pet_records ORDER BY id DESC");
    $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "data" => $pets
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "data" => [],
        "error" => $e->getMessage()
    ]);
}