<?php 
require_once("head.php");
require_once("header.php");
?>

<title>Homepage | Pretpark Webapp</title>

<body class="home-body">


    <div class="wrapper">
        <div class="h1_homepage">
            <h1>Welkom bij de Pretpark Webapp</h1>
        </div>
    </div>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Fotogalerij</h1>
                <p>Ontdek jullie achtbaan foto's!</p>
                <a href="<?php echo $base_url; ?>/foto-galerij.php" class="explore-btn">Explore</a>
            </div>
        </section>
    </main>

<?php
require_once("footer.php");
?>
</body>
</html>

<?php
require_once(__DIR__ . "/backend/conn.php");

$dayNames = ['0_Zondag', '1_Maandag', '2_Dinsdag', '3_Woensdag', '4_Donderdag', '5_Vrijdag', '6_Zaterdag'];
$dayLabels = ['Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag'];

// Truncate the table
$conn->exec("TRUNCATE TABLE photos");

// Loop through all day folders
for ($dayNumber = 0; $dayNumber < 7; $dayNumber++) {
    $dayFolder = $dayNames[$dayNumber];
    $dayLabel = $dayLabels[$dayNumber];
    
    $dayPath = "fotos/" . $dayFolder;
    
    if (is_dir($dayPath)) {
        $files = scandir($dayPath);
        
        foreach ($files as $file) {
            if ($file == "." || $file == "..") {
                continue;
            }
            
            $relativePath = $dayFolder . "/" . $file;
            
            try {
                $stmt = $conn->prepare("INSERT INTO photos (fileName, day_name, day_number) VALUES (?, ?, ?)");
                $stmt->execute([$relativePath, $dayLabel, $dayNumber]);
            } catch (Exception $e) {
            }
        }
    }
}

?>
 