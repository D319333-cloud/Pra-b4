<?php 
require_once("head.php");
require_once("header.php");
?>

<title>Betaling Status | Pretpark Webapp</title>

<body class="home-body">

<main style="display:flex; justify-content:center; align-items:center; min-height:80vh;">
    <div class="hero-content" style="text-align:center;">

        <img src="fotos/achtergrond/duimpje.jpg"
             alt="Betaling Gelukt"
             style="max-width:200px; margin-bottom:20px;">

        <h1>Betaling Gelukt</h1>
        <p>Je betaling is gelukt!</p>

        <a href="<?php echo $base_url; ?>/foto-galerij.php" class="explore-btn">
            Naar de Fotogalerij
        </a>

    </div>
</main>

<?php
require_once("footer.php");
?>
</body>
</html>