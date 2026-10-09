<?php
$menu = menu_data();
$sectionKey = $sectionKey ?? 'breakfast';
$section = $menu[$sectionKey] ?? null;
if ($section): ?>
<section class="menu-section" id="<?= e($sectionKey) ?>">
  <div class="shell">
    <div class="section-heading"><span class="eyebrow"><?= strtoupper(e($sectionKey)) ?></span><h2><?= e($section['title']) ?></h2><p><?= e($section['subtitle'] ?? '') ?></p></div>
    <div class="menu-categories">
    <?php foreach (($section['categories'] ?? []) as $cat): ?>
      <article class="menu-category">
        <div class="cat-title"><h3><?= e($cat['name']) ?></h3><span></span></div>
        <div class="menu-items">
          <?php foreach (($cat['items'] ?? []) as $item): ?>
            <div class="menu-item <?= !empty($item['featured'])?'featured':'' ?>">
              <div class="item-copy"><h4><?= e($item['name']) ?><?= !empty($item['featured'])?'<em>POPULAR</em>':'' ?></h4><?php if (!empty($item['description'])): ?><p><?= e($item['description']) ?></p><?php endif; ?></div>
              <strong class="price">$<?= e($item['price'] ?? '0.00') ?></strong>
            </div>
          <?php endforeach; ?>
        </div>
        <?php if (!empty($cat['note'])): ?><p class="menu-note"><?= e($cat['note']) ?></p><?php endif; ?>
      </article>
    <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
