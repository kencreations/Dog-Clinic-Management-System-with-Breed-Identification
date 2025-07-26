<?php
require_once "connection.php"; 
header('Content-Type: application/json');

$id = $_GET['id'] ?? null;

try {
    if ($id === null) {
        $stmt = $conn->query("SELECT id, owner_name, pet_name, gender, age FROM pet_records ORDER BY id DESC");
        $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $conn->prepare("SELECT * FROM pet_records WHERE id = ?");
        $stmt->execute([$id]);
        $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode([
        "data" => $pets
    ]);
    
} catch (PDOException $e) {
    echo json_encode([
        "data" => [],
        "error" => $e->getMessage()
    ]);
}
?>