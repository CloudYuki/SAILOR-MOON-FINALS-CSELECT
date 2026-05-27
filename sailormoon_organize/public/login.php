<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Sailor Moon — Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="magical-bg" id="magicalBg"></div>

<?php
session_start();
$error = '';

if (isset($_POST['login'])) {
    require_once '../includes/conn.php';

    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = hash('sha256', trim($_POST['password']));

    $sql    = "SELECT * FROM $tablelogin WHERE username='$username' AND password_hash='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_id']       = $row['admin_id'];

        mysqli_query($conn, "UPDATE $tablelogin SET last_login=NOW() WHERE admin_id='{$row['admin_id']}'");

        header('Location: ../admin/index.php');
        exit;
    } else {
        $error = "Invalid username or password. ✨ Try again!";
    }
    mysqli_close($conn);
}
?>

<div class="login-card">
    <span class="moon-logo">🌙</span>
    <h1 class="login-title">SAILOR MOON</h1>
    <p class="login-subtitle">Admin Portal — In the name of the moon! 💖</p>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">✨ Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter username..." required>
        </div>
        <div class="mb-3">
            <label class="form-label">🌙 Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password..." required>
        </div>
        <button type="submit" name="login" class="btn-login">✨ LOGIN ✨</button>
    </form>

    <div class="divider"></div>
    <p class="register-link">No account? <a href="register.php">Register Here</a></p>
</div>

<script>
    const bg = document.getElementById('magicalBg');
    const emojis = ['✨','⭐','💫','💖','🌙'];
    for (let i = 0; i < 18; i++) {
        const s = document.createElement('span');
        s.className = 'float-item';
        s.innerText = emojis[Math.floor(Math.random() * emojis.length)];
        s.style.left = Math.random() * 100 + 'vw';
        s.style.animationDelay = Math.random() * 6 + 's';
        bg.appendChild(s);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
