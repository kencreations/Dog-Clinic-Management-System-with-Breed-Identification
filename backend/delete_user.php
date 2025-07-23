<?php
include "connection.php";
header('Content-Type: application/json');

$username = trim($_POST['username'] ?? '');
$user_id = trim($_POST['user_id'] ?? '');

try {
    if ( !is_numeric($user_id) || empty($username)) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
        exit;
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    if ($stmt->rowCount() === 0) {
        echo json_encode(['status' => 'error', 'message' => 'User not found.']);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => "User '$username' deleted successfully!"]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete user.']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Server error: ' . $e->getMessage()]);
}
?>