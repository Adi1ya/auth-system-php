<?php $title = "Sign Up";
include __DIR__ . "/common/header.php"; ?>

<?php include __DIR__ . "/common/messages.php"; ?>

<div class="main-container">
    <section class="auth-form">
        <h1>Create Account</h1>
        <form action="<?= BASE_URL ?>auth" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" required>
            </div>
            <div class="form-group">
                <label for="confirm_pass">Confirm Password</label>
                <input type="password" name="confirm_pass" id="confirm_pass" required>
            </div>
            <button type="submit" name="submit" value="signup" class="btn">Sign Up</button>
        </form>
        <p class="switch-link">
            Already have an account? <a href="<?= BASE_URL ?>login">Login</a>
        </p>
    </section>
</div>
<?php include __DIR__ . "/common/footer.php"; ?>