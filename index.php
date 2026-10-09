<?php $pageTitle='Home'; require __DIR__.'/library/header.php'; $s=settings(); ?>
<section class="hero">
  <div class="hero-media"><img src="assets/images/hero-storefront.jpg" alt="Sunrise Bagels and Deli storefront"><div class="hero-shade"></div></div>
  <div class="shell hero-content">
    <span class="hero-badge"><?= e($s['hero_badge'] ?? '') ?></span>
    <h1><?= e($s['hero_title'] ?? '') ?></h1>
    <p><?= e($s['hero_text'] ?? '') ?></p>
    <div class="hero-actions"><a class="btn btn-gold" href="<?= e($s['order_url'] ?? '#') ?>">Order Online <span>↗</span></a><a class="btn btn-ghost" href="menu.php">Explore the Menu</a></div>
    <div class="hero-proof"><div><b>FRESH</b><span>Baked daily</span></div><div><b>FAST</b><span>Order ahead</span></div><div><b>LOCAL</b><span>Florida hospitality</span></div></div>
  </div>
  <div class="sun-orbit" aria-hidden="true"><span></span></div>
</section>
<section class="intro-grid shell">
  <div class="intro-copy"><span class="eyebrow">A BETTER BAGEL EXPERIENCE</span><h2>Big-brand energy.<br>Neighborhood soul.</h2><p>Sunrise is designed around the moments people come back for: a hot bagel before work, a breakfast sandwich built exactly right, a deli lunch that actually satisfies, and catering that makes meetings easier.</p><a class="text-link" href="about.php">Discover our story <span>→</span></a></div>
  <div class="feature-cards">
    <article class="feature-card gold"><span>01</span><div class="bagel-art mini"><i></i></div><h3>Fresh Bagels</h3><p>Classic flavors, toasted on request, with sweet and savory spreads.</p></article>
    <article class="feature-card dark"><span>02</span><div class="sandwich-art"><i></i><b></b></div><h3>Made to Order</h3><p>Breakfast sandwiches, hot heroes, deli stacks, wraps and salads.</p></article>
  </div>
</section>
<section class="menu-tease">
  <div class="shell"><div class="section-heading split"><div><span class="eyebrow">CRAVEABLE ALL DAY</span><h2>Meet your new go-to.</h2></div><a class="btn btn-outline" href="menu.php">View Full Menu</a></div>
    <div class="tease-grid">
      <a href="menu.php#breakfast" class="tease-card breakfast"><div class="tease-art bagel-art"><i></i></div><div><span>BREAKFAST</span><h3>Bagels & Breakfast</h3><p>Build your sandwich, grab a platter, or keep it classic.</p></div><b>→</b></a>
      <a href="menu.php#lunch" class="tease-card lunch"><div class="tease-art hero-sandwich"><span></span><i></i><b></b></div><div><span>LUNCH</span><h3>Heroes & Deli</h3><p>Hot parmigiana heroes, Reubens, clubs, wraps and more.</p></div><b>→</b></a>
      <a href="catering.php" class="tease-card catering"><div class="tease-art sun-tray"><i></i><b></b></div><div><span>GROUPS</span><h3>Catering</h3><p>Breakfast meetings, office lunches, family gatherings and events.</p></div><b>→</b></a>
    </div>
  </div>
</section>
<?php require __DIR__.'/library/offers.php'; ?>
<section class="experience shell">
  <div class="experience-image"><img src="assets/images/storefront.png" alt="Sunrise storefront at night"><div class="image-label"><span>3429</span><b>YOUR NEXT MORNING ROUTINE</b></div></div>
  <div class="experience-copy"><span class="eyebrow">COME AS YOU ARE</span><h2>A local shop built to become a landmark.</h2><p>Bright mornings, quick service, classic deli flavors, and a brand that feels instantly familiar. Dine in, take out, order ahead, or let Sunrise feed the whole crew.</p><div class="stats"><div><strong>2</strong><span>Menus<br>Breakfast + Lunch</span></div><div><strong>1</strong><span>Easy stop<br>Morning to afternoon</span></div></div><a class="btn btn-dark" href="contact.php">Plan Your Visit</a></div>
</section>
<section class="loyalty"><div class="shell loyalty-inner"><div class="loyalty-icon">S</div><div><span class="eyebrow">COMING SOON</span><h2>Sunrise Rewards</h2><p>Turn regular mornings into perks. Configure your loyalty link in the owner dashboard when your program is ready.</p></div><a class="btn btn-gold" href="<?= e($s['rewards_url'] ?? '#') ?>">Join Rewards</a></div></section>
<?php require __DIR__.'/library/footer.php'; ?>
