<?php
header('Content-Type: application/json');
include 'connection.php'; 

try {
    if (
        empty($_POST['pet_name']) || empty($_POST['age']) ||
        empty($_POST['birth_date']) || empty($_POST['breed']) ||
        empty($_POST['gender']) || empty($_POST['owner_name']) ||
        empty($_POST['owner_phone'])
    ) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
        exit;
    }

    $pet_name = $_POST['pet_name'];
    $age = $_POST['age'];
    $birth_date = $_POST['birth_date'];
    $breed = $_POST['breed'];
    $height = $_POST['height'] ?? null;
    $weight = $_POST['weight'] ?? null;
    $gender = $_POST['gender'];
    $color = $_POST['color'] ?? null;

    $allergies = $_POST['allergies'] ?? null;
    $existing_conditions = $_POST['existing_conditions'] ?? null;
    $assigned_vet = $_POST['assigned_vet'] ?? null;

    $owner_name = $_POST['owner_name'];
    $owner_phone = $_POST['owner_phone'];
    $owner_email = $_POST['owner_email'] ?? null;
    $barangay = $_POST['barangay'] ?? null;
    $town_city = $_POST['town_city'] ?? null;
    $province = $_POST['province'] ?? null;
    $country = $_POST['country'] ?? null;
    $zip_code = $_POST['zip_code'] ?? null;

    $stmt = $conn->prepare("INSERT INTO pet_records (
    pet_name, age, birth_date, breed, height_cm, weight_kg, gender, color,
    allergies, existing_conditions, assigned_vet,
    owner_name, owner_phone, owner_email,
    barangay, town_city, province, country, zip_code
) VALUES (
    :pet_name, :age, :birth_date, :breed, :height, :weight, :gender, :color,
    :allergies, :existing_conditions, :assigned_vet,
    :owner_name, :owner_phone, :owner_email,
    :barangay, :town_city, :province, :country, :zip_code
)");

$stmt->execute([
    ':pet_name' => $pet_name,
    ':age' => $age,
    ':birth_date' => $birth_date,
    ':breed' => $breed,
    ':height' => $height,
    ':weight' => $weight,
    ':gender' => $gender,
    ':color' => $color,
    ':allergies' => $allergies,
    ':existing_conditions' => $existing_conditions,
    ':assigned_vet' => $assigned_vet,
    ':owner_name' => $owner_name,
    ':owner_phone' => $owner_phone,
    ':owner_email' => $owner_email,
    ':barangay' => $barangay,
    ':town_city' => $town_city,
    ':province' => $province,
    ':country' => $country,
    ':zip_code' => $zip_code
]);


    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Pet record saved successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert record.']);
    }

    
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Server error: ' . $e->getMessage()]);
}
?>