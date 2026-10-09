<?php $s = settings(); ?>
</main>
<footer class="site-footer">
  <div class="shell footer-grid">
    <div class="footer-brand">
      <a class="brand brand-footer" href="index.php"><span class="brand-sun"><i></i></span><span><strong>SUNRISE</strong><small>BAGELS & DELI</small></span></a>
      <p>Fresh-baked mornings, stacked deli lunches, and a neighborhood experience built to feel like your favorite hometown franchise.</p>
      <div class="socials"><a href="<?= e($s['facebook_url'] ?? '#') ?>">Facebook</a><a href="<?= e($s['instagram_url'] ?? '#') ?>">Instagram</a></div>
    </div>
    <div><h4>Explore</h4><a href="menu.php">Full Menu</a><a href="catering.php">Catering</a><a href="about.php">Our Story</a><a href="contact.php">Contact</a></div>
    <div><h4>Visit</h4><p><?= e($s['address'] ?? '') ?></p><a href="tel:<?= e(preg_replace('/\D+/', '', $s['phone'] ?? '')) ?>"><?= e($s['phone'] ?? '') ?></a><a href="mailto:<?= e($s['email'] ?? '') ?>"><?= e($s['email'] ?? '') ?></a></div>
    <div><h4>Hours</h4><?php foreach (($s['hours'] ?? []) as $day=>$hours): ?><p class="hours-row"><span><?= e($day) ?></span><strong><?= e($hours) ?></strong></p><?php endforeach; ?></div>
  </div>
  <div class="shell footer-bottom"><span>© <?= date('Y') ?> <?= e($s['business_name']) ?>. All rights reserved.</span><a href="owner/">Owner Login</a></div>
</footer>
<div class="ai-launcher" id="aiLauncher"><button id="aiOpen" aria-label="Open Sunrise AI Concierge"><span>☀</span><b>Ask Sunrise</b></button></div>
<section class="ai-panel" id="aiPanel" aria-hidden="true">
  <div class="ai-head"><div><strong>Sunrise AI Concierge</strong><small>Menu, hours, catering & more</small></div><button id="aiClose">×</button></div>
  <div class="ai-body" id="aiBody"><div class="ai-msg bot">Hi! I can help with menu questions, breakfast or lunch ideas, hours, and catering.</div></div>
  <form class="ai-form" id="aiForm"><input id="aiInput" maxlength="500" placeholder="Ask about the menu..." autocomplete="off"><button>Send</button></form>
</section>
<script src="assets/js/site.js?v=1.0"></script>
</body></html>
