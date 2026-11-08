<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $category = $_POST['category'] ?? ''; 
    $risk_level = $_POST['risk_level'] ?? 'Low'; 
    $description = $_POST['description'] ?? '';
    $lat = $_POST['lat'] ?? null;
    $lng = $_POST['lng'] ?? null;

    if (!$title || !$lat || !$lng) {
        echo json_encode(['success' => false, 'message' => 'Required fields must be filled!']);
        exit;
    }

    try {
        $sql = "INSERT INTO risk_points (title, category, risk_level, description, geom) 
                VALUES (:title, :category, :risk_level, :description, ST_SetSRID(ST_MakePoint(:lng, :lat), 4326))";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'title' => $title,
            'category' => $category,
            'risk_level' => $risk_level,
            'description' => $description,
            'lng' => $lng,
            'lat' => $lat
        ]);

        echo json_encode(['success' => true, 'message' => 'Risk point saved successfully!']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Save error: ' . $e->getMessage()]);
    }
}
?>