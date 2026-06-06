<?php
require_once(__DIR__ . "/backend/conn.php");

try {
    // Drop existing table if needed
    $conn->exec("DROP TABLE IF EXISTS fotos");
    
    // Create the fotos table
    $conn->exec("CREATE TABLE fotos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        day_name VARCHAR(50) NOT NULL,
        day_number INT NOT NULL
    )");
    
    echo "✓ Tabel 'fotos' succesvol aangemaakt!";
} catch (Exception $e) {
    echo "✗ Fout bij aanmaken tabel: " . $e->getMessage();
}
?>
