<?php
session_start();
?>

<?php if (isset($_SESSION['flash'])):
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
?>
  <div class="flash flash--<?= $flash['type'] ?>">
    <?= htmlspecialchars($flash['message']) ?>
  </div>
<?php endif; ?>

<?php
// (later: echte foutmelding)
$error = $_SESSION['login_error'] ?? null;
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/inlog_register/auth.css">
    <title>Inloggen | Yume Ramen</title>
</head>

<body>

    <section class="auth">

        <div class="auth-card">
            <div class="product-left">
                <a href="1_index.php" class="product-back">← Terug naar home</a>
            </div>

            <h1>ログイン</h1>
            <p class="auth-sub">Inloggen bij Yume Ramen</p>

            <?php if ($error): ?>
                <div class="auth-error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="6_login_handler.php">

                <input
                    type="email"
                    name="email"
                    placeholder="E-mailadres"
                    required>

                <input
                    type="password"
                    name="password"
                    placeholder="Wachtwoord"
                    required>

                <button type="submit" class="auth-btn">
                    Inloggen
                </button>

            </form>

            <p class="auth-link">
                Nog geen account?
                <a href="7_register.php">Registreer hier</a>
            </p>

        </div>

    </section>

<script src="./assets/js/animations.js"></script>

</body>

</html>