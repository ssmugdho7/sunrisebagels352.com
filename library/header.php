<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once __DIR__ . '/helpers.php';
$s = settings();
$pageTitle = $pageTitle ?? $s['business_name'];
$current = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
  <meta name="theme-color" content="#080808">
  <meta name="description" content="<?= e($s['subtagline'] ?? '') ?>">
  <title><?= e($pageTitle) ?> | <?= e($s['business_name']) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/site.css?v=1.0">
</head>
<body>
<div class="announcement"><span class="pulse-dot"></span><?= e($s['announcement'] ?? '') ?><a href="<?= e($s['order_url'] ?? '#') ?>">ORDER ONLINE</a></div>
<header class="site-header" id="siteHeader">
  <div class="shell nav-shell">
    <a class="brand" href="index.php" aria-label="Sunrise Bagels & Deli home">
      <span class="brand-sun" aria-hidden="true"><i></i></span>
      <span><strong>SUNRISE</strong><small>BAGELS & DELI</small></span>
    </a>
    <button class="nav-toggle" id="navToggle" aria-label="Open menu"><span></span><span></span><span></span></button>
    <nav class="main-nav" id="mainNav">
      <a class="<?= $current==='index.php'?'active':'' ?>" href="index.php">Home</a>
      <a class="<?= $current==='menu.php'?'active':'' ?>" href="menu.php">Menu</a>
      <a class="<?= $current==='catering.php'?'active':'' ?>" href="catering.php">Catering</a>
      <a class="<?= $current==='about.php'?'active':'' ?>" href="about.php">Our Story</a>
      <a class="<?= $current==='contact.php'?'active':'' ?>" href="contact.php">Visit</a>
      <a class="nav-order" href="<?= e($s['order_url'] ?? '#') ?>">Order Online <span>↗</span></a>
    </nav>
  </div>
</header>
<main>
