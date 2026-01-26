<?php
session_start();

// (later: echte foutmeldingen)
$error = $_SESSION['register_error'] ?? null;
unset($_SESSION['register_error']);
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/inlog_register/regi_auth.css">
    <title>Registreren | Yume Ramen</title>
</head>

<body>

    <section class="auth">

        <div class="auth-card">

            <div class="product-left">
                <a href="1_index.php" class="product-back">← Terug naar home</a>
            </div>

            <h1>登録</h1>
            <p class="auth-sub">Account aanmaken bij Yume Ramen</p>

            <?php if ($error): ?>
                <div class="auth-error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="7_register_handler.php">

                <div class="field-group">
                    <input
                        type="text"
                        name="first_name"
                        placeholder="Voornaam"
                        required>
                    <input
                        type="text"
                        name="last_name"
                        placeholder="Achternaam"
                        required>
                </div>

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

                <input
                    type="password"
                    name="password_confirm"
                    placeholder="Herhaal wachtwoord"
                    required>

                <button type="submit" class="auth-btn">
                    Account aanmaken
                </button>

            </form>

            <p class="auth-link">
                Heb je al een account?
                <a href="6_login.php">Log hier in</a>
            </p>

        </div>

    </section>

</body>

</html>