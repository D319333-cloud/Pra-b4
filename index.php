<?php 
require_once("head.php");
require_once("header.php");
require_once("footer.php");
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
</body>
</html>