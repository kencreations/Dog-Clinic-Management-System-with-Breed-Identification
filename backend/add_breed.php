<?php
header('Content-Type: application/json');
include 'connection.php'; 

try {
   
    if (
        empty($_POST['name']) ||
        empty($_POST['description']) ||
        empty($_POST['size']) ||
        empty($_POST['coat_type']) ||
        !isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK
    ) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields or image.']);
        exit;
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $coat_type = $_POST['coat_type'];


    $image = $_FILES['image'];
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); 
    }

    $image_name = time() . '_' . basename($image['name']);
    $target_path = $upload_dir . $image_name;

    if (!move_uploaded_file($image['tmp_name'], $target_path)) {
        echo json_encode(['status' => 'error', 'message' => 'Image upload failed.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO breeds (name, description, size, coat_type, image_path) 
                            VALUES (:name, :description, :size, :coat_type, :image_path)");
    
    $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':size' => $size,
        ':coat_type' => $coat_type,
        ':image_path' => $target_path
    ]);

    echo json_encode(['status' => 'success', 'message' => 'Breed added successfully!']);

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Server error: ' . $e->getMessage()]);
}
?>