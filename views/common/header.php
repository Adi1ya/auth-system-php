<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyApp 🚀</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>
<header class="navbar">
  <div class="logo">MyApp 🚀</div>
  <nav>
    <?php if (!isset($_SESSION['userId'])): ?>
      <a href="<?= BASE_URL ?>login">Login</a>
      <a href="<?= BASE_URL ?>signup">Sign Up</a>
    <?php else: ?>
      <a href="<?= BASE_URL ?>dashboard">Dashboard</a>
      <a href="<?= BASE_URL ?>auth?logout=1" class="logout">Logout</a>
    <?php endif; ?>
  </nav>
</header>
<main>
