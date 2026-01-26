<?php
session_start();

// (later: uit database halen)
$orderNumber = 'YR' . rand(1000, 9999);

// (later: adres uit user / order halen)
$address = "Heer Bokkelweg 21<br>2034 AB Rotterdam";
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/thankyou/thankyou.css">
    <title>Bedankt voor je bestelling</title>
</head>

<body>

    <section class="thankyou">

        <div class="thankyou-card">

            <div class="check-icon">✔</div>

            <h1 class="jp-text">ありがとうございます</h1>
            <p class="jp-sub">Arigatou Gozaimasu!</p>

            <h2>Bestelling geplaatst 🎉</h2>

            <p class="thankyou-text">
                Je authentieke Japanse ramen wordt met zorg bereid en is onderweg.<br>
                Verwachte bezorgtijd: <strong>30–45 minuten</strong>
            </p>

            <div class="order-box">
                <span>Bestelnummer</span>
                <strong>#<?= $orderNumber ?></strong>
            </div>

            <div class="info-box">
                <div>
                    <strong>Bezorgadres</strong>
                    <p><?= $address ?></p>
                </div>

                <div>
                    <strong>Bezorgtijd</strong>
                    <p>30–45 minuten</p>
                </div>
            </div>

            <a href="2_menu.php" class="back-btn">
                Terug naar menu
            </a>

        </div>

    </section>

</body>

</html>