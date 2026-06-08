<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];

    unset($_SESSION['cart'][$id]);

    header('Location: winkelwagen.php');
    exit;
}

if (isset($_POST['update'])) {

    foreach ($_POST['quantity'] as $id => $quantity) {

        if ($quantity <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    }

    header('Location: winkelwagen.php');
    exit;
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Winkelmand</title>

    <?php 
    require_once("head.php");
    ?>
</head>

<body>

<?php 
require_once("header.php");
?>

<div class="cart-container">

    <div class="cart-title">
        <h1>Winkelmand</h1>
    </div>

    <?php if (empty($_SESSION['cart'])): ?>

        <div class="cart-empty">
            <p>Je winkelmand is leeg.</p>

            <br>

            <a class="cart-back-btn" href="index.php">
                Verder winkelen
            </a>
        </div>

    <?php else: ?>

    <form method="POST">

        <div class="cart-table-wrapper">

            <table class="cart-table">

                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Prijs</th>
                        <th>Aantal</th>
                        <th>Subtotaal</th>
                        <th>Actie</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($_SESSION['cart'] as $id => $item): 

                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>

                    <tr>

                        <td>
                            <div class="cart-product">

                                <div>
                                    <div class="cart-product-name">
                                        <?= $item['name']; ?>
                                    </div>
                                </div>

                            </div>
                        </td>

                        <td class="cart-price">
                            €<?= number_format($item['price'], 2, ',', '.'); ?>
                        </td>

                        <td class="cart-quantity">
                            <input 
                                type="number" 
                                name="quantity[<?= $id; ?>]" 
                                value="<?= $item['quantity']; ?>" 
                                min="0"
                            >
                        </td>

                        <td class="cart-subtotal">
                            €<?= number_format($subtotal, 2, ',', '.'); ?>
                        </td>

                        <td>
                            <a class="cart-remove" href="?remove=<?= $id; ?>">
                                Verwijderen
                            </a>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

        <div class="cart-actions">

            <a class="cart-back-btn" href="index.php">
                Verder winkelen
            </a>

            <button class="cart-update-btn">
                <a class="cart-update-btn" href="paginamelding.php">Betalen</a>
            </button>

        </div>

    </form>

    <div class="cart-total">
        <h2>
            Totaal:
            <span>
                €<?= number_format($total, 2, ',', '.'); ?>
            </span>
        </h2>
    </div>

    <?php endif; ?>

</div>

<?php 
require_once("footer.php");
?>

</body>
</html>