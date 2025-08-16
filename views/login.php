<?php $title = "Login";
include __DIR__ . "/common/header.php"; ?>

<?php include __DIR__ . "/common/messages.php"; ?>
<div class="main-container">

  <section class="auth-form">
    <h1>Welcome Back</h1>
    <form action="<?= BASE_URL ?>auth" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" required>
      </div>
      <button type="submit" name="submit" value="login" class="btn">Login</button>
    </form>
    <p class="switch-link">
      Don’t have an account? <a href="<?= BASE_URL ?>signup">Sign Up</a>
    </p>
  </section>
</div>
<?php include __DIR__ . "/common/footer.php"; ?>