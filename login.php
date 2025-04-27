<?php
session_start();
include 'users.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit;
        }
    }
    $error = 'Invalid username or password';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modern-overrides.css">
</head>
<body>
    <header>
        <a href="index.php" class="btn-secondary btn-back">
            <span style="font-size:1.3em;">&#8592;</span> Back to catalog
        </a>
    </header>
    <section>
        <form method="post" class="login-form">
            <div class="login-icon">
                <svg width="48" height="48" fill="#357ab8"><circle cx="24" cy="16" r="12"/><ellipse cx="24" cy="38" rx="16" ry="8"/></svg>
            </div>
            <h2>Sign in to your account</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>
            </div>
            <?php if ($error): ?>
                <div class="modal-error animate__shakeX"> <?= htmlspecialchars($error) ?> </div>
            <?php endif; ?>
            <button type="submit" class="btn-main">Sign in</button>
        </form>
        <script>
        function togglePassword() {
            var pwd = document.getElementById('password');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        }
        </script>
    </section>
</body>
</html>
