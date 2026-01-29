    <header class="sticky top-0 z-50 bg-[#5a1f2b]">
      <nav class="flex items-center justify-between px-4 py-3">
        <!-- Logo -->
        <div class="flex items-center gap-2 text-white font-semibold">
          <img src="assets/images/global/logo.png"
            alt="Yume Ramen restaurant"
            class="w-10">
          <div class="flex items-center flex-col">
            <span class="text-sm">Yume Ramen</span>
            <p class="text-[#c8c067] font-light text-xs">夢ラーメン</p>
          </div>
        </div>

        <!-- Acties -->
        <div class="flex items-center gap-3">

          <!-- Login / Register -->
          <?php if (isset($_SESSION['user_id'])): ?>

            <a href="8_logout.php"
              class="flex items-center gap-1 rounded-full bg-[#7a2a3a] px-3 py-1.5 text-xs text-white hover:bg-[#8f3246] transition">
              <span>Uitloggen</span>
            </a>

          <?php else: ?>

            <a href="6_login.php"
              class="flex items-center gap-1 rounded-full bg-[#7a2a3a] px-3 py-1.5 text-xs text-white hover:bg-[#8f3246] transition">
              <span>Inloggen</span>
            </a>

          <?php endif; ?>

          <!-- Winkelwagen -->
          <button onclick="openCart()" class="cart-btn">
            <a
              class="flex items-center gap-1 rounded-full bg-[#e11d48] px-3 py-1.5 text-xs text-white hover:bg-[#be123c] transition">
              🛒
              <span>Winkelwagen</span>
            </a>
          </button>

        </div>
      </nav>
    </header>