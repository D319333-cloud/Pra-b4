<?php
require_once __DIR__ . '/conn.php';

// Lees gekozen filterwaarden uit de URL
$day = $_GET['day_name'] ?? 'all';

if ($day === 'all') {
    $sql = "SELECT * FROM fotos ORDER BY id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} 

else {
    $sql = "SELECT * FROM fotos WHERE day_name = :day ORDER BY id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ":day" => $day,
    ]);
}

$fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);

