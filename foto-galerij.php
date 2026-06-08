<?php 
session_start();

require_once("head.php");
require_once("header.php");

require_once("backend/conn.php");
require_once("backend/filtercontroller.php");

/* Winkelwagen aanmaken */
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* Product toevoegen */
if (isset($_POST['add_to_cart'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    if (isset($_SESSION['cart'][$id])) {

        $_SESSION['cart'][$id]['quantity']++;

    } else {

        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'quantity' => 1
        ];
    }

    header("Location: winkelwagen.php");
    exit;
}
?>

<body>

<form method="GET" action="foto-galerij.php" class="filter-form">

    <label for="afdeling">Filter op afdeling:</label>

    <select id="afdeling" name="day_name" onchange="this.form.submit()">

        <option value="all" <?php echo $day === 'all' ? 'selected' : ''; ?>>
            Alle dagen
        </option>

        <option value="Maandag" <?php echo $day === 'Maandag' ? 'selected' : ''; ?>>
            Maandag
        </option>

        <option value="Dinsdag" <?php echo $day === 'Dinsdag' ? 'selected' : ''; ?>>
            Dinsdag
        </option>

        <option value="Woensdag" <?php echo $day === 'Woensdag' ? 'selected' : ''; ?>>
            Woensdag
        </option>

        <option value="Donderdag" <?php echo $day === 'Donderdag' ? 'selected' : ''; ?>>
            Donderdag
        </option>

        <option value="Vrijdag" <?php echo $day === 'Vrijdag' ? 'selected' : ''; ?>>
            Vrijdag
        </option>

        <option value="Zaterdag" <?php echo $day === 'Zaterdag' ? 'selected' : ''; ?>>
            Zaterdag
        </option>

        <option value="Zondag" <?php echo $day === 'Zondag' ? 'selected' : ''; ?>>
            Zondag
        </option>

    </select>

</form>

<main class="gallery-grid">

<?php foreach($fotos as $foto): ?>

    <article class="attractie-kaart">

        <div>

            <img 
                src="<?php echo $base_url; ?>/fotos/<?php echo $foto['file_name']; ?>" 
                alt="<?php echo $foto['file_name']; ?>"
            >

            <p>
                <?php echo $foto['day_name']; ?>
            </p>

            <p>
                €9,95
            </p>

            <form method="POST">

                <input 
                    type="hidden" 
                    name="id" 
                    value="<?php echo $foto['id']; ?>"
                >

                <input 
                    type="hidden" 
                    name="name" 
                    value="<?php echo $foto['day_name']; ?>"
                >

                <input 
                    type="hidden" 
                    name="price" 
                    value="9.95"
                >

                <input 
                    type="hidden" 
                    name="image" 
                    value="<?php echo $foto['file_name']; ?>"
                >

                <button type="submit" name="add_to_cart">
                    Toevoegen aan winkelwagen
                </button>

            </form>

        </div>

    </article>

<?php endforeach; ?>

</main>

</body>

<?php
require_once("footer.php");
?>