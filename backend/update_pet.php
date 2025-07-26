<?php
require_once "connection.php";
header('Content-Type: application/json');

try {
    // Get pet ID
    $pet_id = $_POST['id'] ?? null;
    if (!$pet_id || !is_numeric($pet_id)) {
        throw new Exception("Invalid pet ID.");
    }

    // Collect form inputs
    $fields = [
        'pet_name' => $_POST['pet_name'] ?? null,
        'age' => $_POST['age'] ?? null,
        'birth_date' => $_POST['birth_date'] ?? null,
        'breed' => $_POST['breed'] ?? null,
        'height_cm' => $_POST['height'] ?? null,
        'weight_kg' => $_POST['weight'] ?? null,
        'gender' => $_POST['gender'] ?? null,
        'color' => $_POST['color'] ?? null,
        'allergies' => $_POST['allergies'] ?? null,
        'existing_conditions' => $_POST['existing_conditions'] ?? null,
        'assigned_vet' => $_POST['assigned_vet'] ?? null,
        'owner_name' => $_POST['owner_name'] ?? null,
        'owner_phone' => $_POST['owner_phone'] ?? null,
        'owner_email' => $_POST['owner_email'] ?? null,
        'barangay' => $_POST['barangay'] ?? null,
        'town_city' => $_POST['town_city'] ?? null,
        'province' => $_POST['province'] ?? null,
        'country' => $_POST['country'] ?? null,
        'zip_code' => $_POST['zip_code'] ?? null
    ];

    $photoName = null;
    if (!empty($_FILES['pet_photo']['name'])) {
        $targetDir = "../uploads/pet_photos/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = basename($_FILES["pet_photo"]["name"]);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $photoName = uniqid("pet_") . "." . $fileExt;
        $targetFile = $targetDir . $photoName;

        if (!move_uploaded_file($_FILES["pet_photo"]["tmp_name"], $targetFile)) {
            throw new Exception("Failed to upload pet photo.");
        }

        $fields['pet_photo'] = $photoName;
    }

    $setParts = [];
    $params = [];
    foreach ($fields as $column => $value) {
        if ($value !== null) {
            $setParts[] = "$column = ?";
            $params[] = $value;
        }
    }

    if (empty($setParts)) {
        throw new Exception("No data provided for update.");
    }

    $params[] = $pet_id; 

    $sql = "UPDATE pet_records SET " . implode(", ", $setParts) . " WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    echo json_encode([
        "success" => true,
        "message" => "Pet record updated successfully."
    ]);
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "Error: " . $e->getMessage()
    ]);
}
?>