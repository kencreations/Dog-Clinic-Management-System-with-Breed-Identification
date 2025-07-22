<?php

include "connection.php";
header('Content-Type: application/json');

try {
    if (empty($_POST['id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
        exit;
    }

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM breeds WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Breed deleted successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete breed.']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Server error: ' . $e->getMessage()]);
}