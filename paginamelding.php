<?php 
require_once("head.php");
require_once("header.php");

$status = $_GET['status'] ?? '';
?>

<title>Betaling Status | Pretpark Webapp</title>

<body class="home-body">

    <div class="wrapper">
        <div class="h1_homepage">
            <?php if ($status == 'gelukt'): ?>
                <h1>Bedankt voor je betaling!</h1>
            <?php else: ?>
                <h1>Betaling mislukt</h1>
            <?php endif; ?>
        </div>
    </div>

    <main>
        <section class="hero">
            <div class="hero-content">
                <?php if ($status == 'gelukt'): ?>
                    <h1>Betaling Geslaagd</h1>
                    <p>Je betaling is succesvol verwerkt. Je kunt nu je foto's bekijken!</p>
                    <a href="<?php echo $base_url; ?>/foto-galerij.php" class="explore-btn">Naar de Fotogalerij</a>
                <?php else: ?>
                    <h1>Oeps, er ging iets mis</h1>
                    <p>De betaling is helaas afgebroken of geannuleerd. Probeer het opnieuw.</p>
                    <a href="<?php echo $base_url; ?>/index.php" class="explore-btn">Terug naar Home</a>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php
require_once("footer.php");
?>
</body>
</html>
