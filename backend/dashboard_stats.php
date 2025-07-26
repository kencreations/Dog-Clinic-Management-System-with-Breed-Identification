<?php
include "connection.php";
header('Content-Type: application/json');

// USERS COUNT
$users = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
$patients = $conn->query("SELECT COUNT(*) FROM pet_records")->fetchColumn();
$breeds = $conn->query("SELECT COUNT(*) FROM breeds")->fetchColumn();


$monthly = $conn->query("
    SELECT MONTH(created_at) as month, COUNT(*) as total
    FROM pet_records
    WHERE YEAR(created_at) = YEAR(CURDATE())
    GROUP BY month
")->fetchAll(PDO::FETCH_KEY_PAIR); 

$monthlyData = [];
for ($i = 1; $i <= 12; $i++) {
    $monthlyData[] = isset($monthly[$i]) ? (int)$monthly[$i] : 0;
}

$gender = $conn->query("
    SELECT gender, COUNT(*) as total
    FROM pet_records
    GROUP BY gender
")->fetchAll(PDO::FETCH_KEY_PAIR); 

echo json_encode([
    "users" => (int)$users,
    "patients" => (int)$patients,
    "breeds" => (int)$breeds,
    "monthly" => $monthlyData,
    "gender" => $gender
]);