<?php 
require_once("head.php");

$message_sent = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // Hier kun je later de email versturen of opslaan in database
    // Voor nu tonen we alleen een bevestiging
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        $message_sent = true;
    }
}
?>

<title>Contact | Pretpark Webapp</title>

<body>
    <header>
        <div class="header-container">
            <a href="/" class="logo">Fotogalerij</a>
            <nav>
                <a href="index.php">Home</a>
                <a href="fotogalerij.php">Fotogalerij</a>
                <a href="contact.php">Contact</a>
                <span class="cart-icon">🛒</span>
            </nav>
        </div>
    </header>

    <main>
                <div class="contact-form-wrapper">
                    <h2>Stuur ons een bericht</h2>
                    
                    <?php if ($message_sent): ?>
                        <div class="success-message" style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                            ✓ Bedankt! Uw bericht is succesvol verstuurd. We nemen zo snel mogelijk contact met u op.
                        </div>
                    <?php endif; ?>
                    
                    <form class="contact-form" method="POST" action="contact.php">
                        <div class="form-group">
                            <label for="name">Naam *</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Onderwerp *</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Bericht *</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Verstuur Bericht</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Fotogalerij. Alle rechten voorbehouden.</p>
        <p>
            <a href="contact.php">Contact</a>
        </p>
    </footer>

</body>
</html>