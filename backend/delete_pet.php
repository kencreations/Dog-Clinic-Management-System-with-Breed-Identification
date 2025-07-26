<?php
include "connection.php";
header('Content-Type: application/json');

$pet_id = trim($_POST['user_id'] ?? '');
$owner_name = trim($_POST['username'] ?? ''); 

try {
    
     if (!is_numeric($pet_id)) {
        echo json_encode(['success' => false, 'message' => 'Invalid pet ID.']);
        exit;
    }
    

    $stmt = $conn->prepare("SELECT pet_name FROM pet_records WHERE id = ?");
    $stmt->execute([$pet_id]);

    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Pet record not found.']);
        exit;
    }

    $pet = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("DELETE FROM pet_records WHERE id = ?");
    $stmt->bindParam(1, $pet_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => "Pet record for '{$pet['pet_name']}' deleted successfully!"
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete pet record.']);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Server error: ' . $e->getMessage()
    ]);
}
?>