<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../src/output.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/homepage.css">
  <title>Homepage</title>
</head>

<body>

  <?php
  include './includes/navbar.php';
  include './includes/header.php'
  ?>

  <section class="categories">
    <h2 class="categories__title">Categorieën</h2>

    <div class="categories__track">

      <article class="category-card">
        <img src="assets/images/categories/miso_ramen.jpeg" alt="Miso ramen">
        <div class="category-card__content">
          <h3>Miso</h3>
          <p>Rijke & volle bouillon</p>
        </div>
      </article>

      <article class="category-card">
        <img src="assets/images/categories/shoyu_ramen.jpeg" alt="Shoyu ramen">
        <div class="category-card__content">
          <h3>Shoyu</h3>
          <p>Sojasaus bouillon</p>
        </div>
      </article>

      <article class="category-card">
        <img src="assets/images/categories/tonkotsu_ramen.jpeg" alt="Tonkotsu ramen">
        <div class="category-card__content">
          <h3>Tonkotsu</h3>
          <p>Romig & intens</p>
        </div>
      </article>

      <article class="category-card">
        <img src="assets/images/categories/spicy.jpeg" alt="Spicy ramen">
        <div class="category-card__content">
          <h3>Spicy 🌶</h3>
          <p>Pittig & krachtig</p>
        </div>
      </article>

      <article class="category-card">
        <img src="assets/images/categories/vegetarisch.jpeg" alt="Vegetarische ramen">
        <div class="category-card__content">
          <h3>Vegetarisch 🌱</h3>
          <p>Licht & puur</p>
        </div>
      </article>

    </div>
    <div class="homepage_scrol_tip">← Scroll om meer categorieën te zien →</div>
  </section>

  <section class="popular">
    <div class="popular__header">
      <div class="popular__header_text">
        <svg
          class="chart_popular"
          xmlns="http://www.w3.org/2000/svg"
          width="28"
          height="28"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          style="color: #C41E3A; margin-right: 5px;">
          <!-- The trending line -->
          <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
          <!-- The arrow head -->
          <polyline points="17 6 23 6 23 12"></polyline>
        </svg>
        <h2>Populair nu</h2>
      </div>
      <span>Wat anderen bestellen</span>
    </div>

    <div class="popular__track">

      <article class="popular-card">
        <img src="assets/images/ramen/classic_shoyu_ramen.jpeg" alt="Classic Shoyu Ramen">

        <div class="popular-card__body">
          <span class="popular-badge">Populair</span>
          <h3>Classic Shoyu Ramen</h3>
          <p>Traditionele sojasaus bouillon</p>

          <div class="popular-card__footer">
            <span class="price">€13,50</span>
            <button>Bestel</button>
          </div>
        </div>
      </article>

      <article class="popular-card">
        <img src="assets/images/ramen/tonkotsu_ramen.jpeg" alt="Tonkotsu Ramen">

        <div class="popular-card__body">
          <span class="popular-badge">Populair</span>
          <h3>Tonkotsu Ramen</h3>
          <p>Romige varkensbouillon</p>

          <div class="popular-card__footer">
            <span class="price">€14,50</span>
            <button>Bestel</button>
          </div>
        </div>
      </article>

      <article class="popular-card">
        <img src="assets/images/ramen/tantanmen_spicy.jpeg" alt="Tantanmen Spicy">

        <div class="popular-card__body">
          <span class="popular-badge">Populair</span>
          <h3>Tantanmen Spicy</h3>
          <p>Pittige sesambouillon</p>

          <div class="popular-card__footer">
            <span class="price">€15,00</span>
            <button>Bestel</button>
          </div>
        </div>
      </article>

    </div>
  </section>

  <section class="story-banner">
    <div class="story-banner__overlay"></div>

    <div class="story-banner__content">
      <span class="story-banner__label">Yume Ramen</span>
      <h2>Van keuken<br>tot jouw deur</h2>
      <p>
        Onze ramen wordt dagelijks vers bereid volgens
        traditionele Japanse recepten.
      </p>

      <a href="menu.html" class="story-banner__button">
        Ontdek het menu
      </a>
    </div>
  </section>

  <section class="deals">
    <div class="deals__header">
      <h2>Aanbiedingen</h2>
      <span>Tijdelijk extra voordelig</span>
    </div>

    <div class="deals__track">

      <article class="deal-card">
        <img src="assets/images/ramen/miso_ramen_ag.jpg" alt="Miso Ramen">

        <div class="deal-card__body">
          <span class="deal-badge">Aanbieding</span>
          <h3>Miso Ramen</h3>
          <p>Rijke miso bouillon met verse toppings</p>

          <div class="deal-card__footer">
            <div class="prices">
              <span class="old-price">€13,50</span>
              <span class="new-price">€11,90</span>
            </div>
            <button>Bestel</button>
          </div>
        </div>
      </article>

      <article class="deal-card">
        <img src="assets/images/ramen/shoyu_ramen_ag.webp" alt="Shoyu Ramen">

        <div class="deal-card__body">
          <span class="deal-badge">Aanbieding</span>
          <h3>Shoyu Ramen</h3>
          <p>Klassieke sojasaus bouillon</p>

          <div class="deal-card__footer">
            <div class="prices">
              <span class="old-price">€13,00</span>
              <span class="new-price">€11,50</span>
            </div>
            <button>Bestel</button>
          </div>
        </div>
      </article>

      <article class="deal-card">
        <img src="assets/images/ramen/vegetarische_ramen_ag.webp" alt="Vegetarische Ramen">

        <div class="deal-card__body">
          <span class="deal-badge">Aanbieding</span>
          <h3>Vegetarische Ramen</h3>
          <p>Lichte groentebouillon met tofu</p>

          <div class="deal-card__footer">
            <div class="prices">
              <span class="old-price">€12,50</span>
              <span class="new-price">€10,90</span>
            </div>
            <button>Bestel</button>
          </div>
        </div>
      </article>

    </div>
  </section>

  <?php
  include './includes/footer.php';
  ?>

  <script src="./assets/js/swipe_hint.js"></script>

</body>

</html>