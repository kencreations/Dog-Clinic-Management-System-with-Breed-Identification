<?php
header('Content-Type: application/json');
include 'connection.php';

try {
    if (
        empty($_POST['id']) ||
        empty($_POST['name']) ||
        empty($_POST['description']) ||
        empty($_POST['size']) ||
        empty($_POST['coat_type'])
    ) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please fill in all required fields.'
        ]);
        exit;
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $coat = $_POST['coat_type'];

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileType, $allowedTypes)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid image format.']);
            exit;
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Update with image
            $stmt = $conn->prepare("UPDATE breeds SET name = :name, description = :description, size = :size, coat_type = :coat, image_path = :image WHERE id = :id");
            $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':size' => $size,
                ':coat' => $coat,
                ':image' => $targetFilePath,
                ':id' => $id
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
            exit;
        }
    } else {
        $stmt = $conn->prepare("UPDATE breeds SET name = :name, description = :description, size = :size, coat_type = :coat WHERE id = :id");
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':size' => $size,
            ':coat' => $coat,
            ':id' => $id
        ]);
    }

    echo json_encode(['status' => 'success', 'message' => 'Breed updated successfully!']);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Server error: ' . $e->getMessage()
    ]);
}
?>