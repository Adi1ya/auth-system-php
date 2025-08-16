<?php if (!empty($_SESSION['message'])): ?>
  <div class="toast <?= $_SESSION['message']['status'] ?>">
    <?= htmlspecialchars($_SESSION['message']['message']) ?>
    <span class="close-btn">&times;</span>
  </div>
  <?php unset($_SESSION['message']); // clear message after showing ?>
<?php endif; ?>
