<?php
include 'connection.php';

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$f_name = trim($_POST['first_name'] ?? '');
$l_name = trim($_POST['last_name'] ?? '');
$username = trim($_POST['username'] ?? '');
$role = 0;

if (empty($email)) {
    echo json_encode(["success" => false, "message" => "Email is required."]);
    exit;
} 
if (empty($password)) {
    echo json_encode(["success" => false, "message" => "Password is required."]);
    exit;
}
if (empty($f_name) || empty($l_name)) {
    echo json_encode(["success" => false, "message" => "Full name is required."]);
    exit;
}
if (empty($username)) { 
    echo json_encode(["success" => false, "message" => "Username is required."]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->rowCount() > 0) {
    echo json_encode(["success" => false, "message" => "Email is already registered."]);
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (email, password, f_name, l_name, username, role) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt->execute([$email, $hashed_password, $f_name, $l_name, $username, $role])) {
    echo json_encode(["success" => true, "message" => "User added successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to add user."]);
}

?>