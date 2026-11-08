<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db_connect.php';

try {
    $sql = "SELECT id, title, category, risk_level, description, 
                   ST_AsGeoJSON(geom) AS geom 
            FROM risk_points";
    
    $stmt = $pdo->query($sql);
    $records = $stmt->fetchAll();

    $features = [];

    foreach ($records as $row) {
        $features[] = [
            'type' => 'Feature',
            'geometry' => json_decode($row['geom']),
            'properties' => [
                'id' => $row['id'],
                'title' => $row['title'],
                'category' => $row['category'],
                'risk_level' => $row['risk_level'],
                'description' => $row['description']
            ]
        ];
    }

    $geojson = [
        'type' => 'FeatureCollection',
        'features' => $features
    ];

    echo json_encode($geojson, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>