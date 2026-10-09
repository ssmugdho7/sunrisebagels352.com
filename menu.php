<?php $pageTitle='Menu'; require __DIR__.'/library/header.php'; $bannerEyebrow='FRESH • FAST • MADE YOUR WAY'; $bannerTitle='The Sunrise Menu'; $bannerText='Breakfast favorites, fresh bagels, hot heroes, deli classics, wraps, salads and more.'; require __DIR__.'/library/banner.php'; ?>
<nav class="menu-tabs"><div class="shell"><a href="#breakfast">Breakfast</a><a href="#lunch">Lunch</a></div></nav>
<?php $sectionKey='breakfast'; require __DIR__.'/library/menu-section.php'; ?>
<div class="menu-divider"><div class="bagel-art divider-bagel"><i></i></div></div>
<?php $sectionKey='lunch'; require __DIR__.'/library/menu-section.php'; ?>
<section class="disclaimer"><div class="shell"><p><strong>Menu note:</strong> Prices currently show launch placeholders and can be updated instantly from the password-protected Owner Dashboard.</p></div></section>
<?php require __DIR__.'/library/offers.php'; require __DIR__.'/library/footer.php'; ?>
