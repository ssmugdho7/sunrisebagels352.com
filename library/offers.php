<?php $s = settings(); ?>
<section class="offer-band">
  <div class="shell offer-inner"><div><span class="eyebrow">SUNRISE SPECIAL</span><h2><?= e($s['promo_title'] ?? '') ?></h2><p><?= e($s['promo_text'] ?? '') ?></p></div><a class="btn btn-dark" href="<?= e($s['promo_link'] ?? '#') ?>"><?= e($s['promo_button'] ?? 'Learn More') ?> <span>↗</span></a></div>
</section>
