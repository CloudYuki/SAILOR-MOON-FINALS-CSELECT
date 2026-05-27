<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Sailor Moon — Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="magical-bg" id="magicalBg"></div>

<header>
    <div class="header-inner">
        <a href="index.php" class="logo-area">
            <span class="logo-moon">🌙</span>
            <span class="logo-text">SAILOR MOON</span>
            <span class="admin-badge">ADMIN</span>
        </a>
        <nav>
            <a href="index.php"              class="nav-link pink">👥 Characters</a>
            <a href="highlights.php"         class="nav-link gold">⭐ Highlights</a>
            <a href="media.php"              class="nav-link purple">🎬 Media</a>
            <a href="messages.php"           class="nav-link blue">💌 Messages</a>
            <a href="search.php"             class="nav-link gold">🔍 Search</a>
            <a href="admin_management.php"   class="nav-link pink" style="background:linear-gradient(135deg,#a06fff,#b88aff);box-shadow:0 4px 0 #8054d4;">⚙️ Admins</a>
            <a href="logout.php"             class="nav-link red">🚪 Logout (<?= htmlspecialchars($_SESSION['admin_username']) ?>)</a>
        </nav>
    </div>
</header>

<script>
    const bg = document.getElementById('magicalBg');
    const emojis = ['✨','⭐','💫','💖','🌙'];
    for (let i = 0; i < 12; i++) {
        const s = document.createElement('span');
        s.className = 'float-item';
        s.innerText = emojis[Math.floor(Math.random() * emojis.length)];
        s.style.left = Math.random() * 100 + 'vw';
        s.style.animationDelay = Math.random() * 6 + 's';
        bg.appendChild(s);
    }
</script>
