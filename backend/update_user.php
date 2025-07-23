<?php
include "connection.php";
header('Content-Type: application/json');

$user_id = trim($_POST['user_id'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$f_name = trim($_POST['first_name'] ?? '');
$l_name = trim($_POST['last_name'] ?? '');
$username = trim($_POST['username'] ?? '');

if (empty($user_id) || empty($email) || empty($f_name) || empty($l_name) || empty($username)) {
    echo json_encode(["success" => false, "message" => "All fields except password are required."]);
    exit;
}

// Check if email is already taken by another user
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
$stmt->execute([$email, $user_id]);
if ($stmt->rowCount() > 0) {
    echo json_encode(["success" => false, "message" => "Email is already registered by another user."]);
    exit;
}


if (!empty($password)) {

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET f_name = ?, l_name = ?, email = ?, username = ?, password = ? WHERE id = ?";
    $params = [$f_name, $l_name, $email, $username, $hashed_password, $user_id];
} else {
    $sql = "UPDATE users SET f_name = ?, l_name = ?, email = ?, username = ? WHERE id = ?";
    $params = [$f_name, $l_name, $email, $username, $user_id];
}

$stmt = $conn->prepare($sql);
$success = $stmt->execute($params);

if ($success) {
    echo json_encode(["success" => true, "message" => "User updated successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to update user."]);
}
?>