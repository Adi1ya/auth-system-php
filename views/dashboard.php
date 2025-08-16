<?php include __DIR__ . "/common/header.php"; ?>

<div class="dashboard">
  <!-- Sidebar -->
  <aside class="sidebar">
    <h2>📊 Menu</h2>
    <nav>
      <a href="#"><i>🏠</i> Home</a>
      <a href="#"><i>👤</i> Profile</a>
      <a href="#"><i>⚙️</i> Settings</a>
      <a href="<?= BASE_URL ?>auth?logout=1"><i>🚪</i> Logout</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <section class="content">
    <h1>👋 Welcome, <?= $_SESSION['user']['name'] ?? 'User' ?>!</h1>

    <div class="cards">
      <div class="card glass">
        <h3>✨ Quick Stats</h3>
        <p>Overview of your activity</p>
      </div>
      <div class="card glass">
        <h3>📊 Analytics</h3>
        <p>See your growth trends</p>
      </div>
      <div class="card glass">
        <h3>📩 Messages</h3>
        <p>Check recent updates</p>
      </div>
    </div>
  </section>
</div>

<?php include __DIR__ . "/common/footer.php"; ?>
