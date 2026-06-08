<?php 
require_once("head.php");
require_once("header.php");

require_once("backend/conn.php");

require_once("backend/filtercontroller.php");
?>

<body>
    <form method="GET" action="foto-galerij.php" class="filter-form">
        <label for="afdeling">Filter op afdeling:</label>
        <select id="afdeling" name="day_name" onchange="this.form.submit()">
            <option value="all" <?php echo $day === 'all' ? 'selected' : ''; ?>>Alle dagen</option>
            <option value="Maandag" <?php echo $day === 'Maandag' ? 'selected' : ''; ?>>Maandag</option>
            <option value="Dinsdag" <?php echo $day === 'Dinsdag' ? 'selected' : ''; ?>>Dinsdag</option>
            <option value="Woensdag" <?php echo $day === 'Woensdag' ? 'selected' : ''; ?>>Woensdag</option>
            <option value="Donderdag" <?php echo $day === 'Donderdag' ? 'selected' : ''; ?>>Donderdag</option>
            <option value="Vrijdag" <?php echo $day === 'Vrijdag' ? 'selected' : ''; ?>>Vrijdag</option>
            <option value="Zaterdag" <?php echo $day === 'Zaterdag' ? 'selected' : ''; ?>>Zaterdag</option>
            <option value="Zondag" <?php echo $day === 'Zondag' ? 'selected' : ''; ?>>Zondag</option>
        </select>
    </form>
    <main class="gallery-grid">
        <?php foreach($fotos as $foto): ?>
            <article class="attractie-kaart">
                <div>
                    <img src="<?php echo $base_url; ?>/fotos/<?php echo $foto['file_name']; ?>" alt="<?php echo $foto['file_name']; ?>">
                    <p><?php echo $foto['day_name']; ?></p>
                    <a href="winkelwagen.php">
                    <button>Kopen</button>
                    </a>
            </div>
            </article>
        <?php endforeach; ?>
    </main>
</body>


<?php
require_once("footer.php");
?>