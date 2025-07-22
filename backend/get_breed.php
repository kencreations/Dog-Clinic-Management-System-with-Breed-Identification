<?php

header('Content-Type: application/json');
include 'connection.php';

try {
    
    if(empty($_GET["id"])){
        $stmt = $conn->prepare("SELECT * FROM breeds ORDER BY created_at DESC");
        $stmt->execute();
        $breeds = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            "status" => "success",
            "data" => $breeds
        ]);
    }

    else {
        $id = $_GET["id"];
        $stmt = $conn->prepare("SELECT * FROM breeds WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $breed = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($breed) {
            echo json_encode([
                "status" => "success",
                "data" => $breed
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Breed not found."
            ]);
        }
    }
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to fetch breed data: " . $e->getMessage()
    ]);
}
?>