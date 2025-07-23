<?php

session_start();
header('Content-Type: application/json');
include 'connection.php';

session_destroy();
echo json_encode([
    "success" => true,
    "message" => "Logout successful.",
    "redirect" => "./login.php"
]);
exit;

?>