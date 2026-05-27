<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Sailor Moon — Highlights</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/public-shared.css">
    <link rel="stylesheet" href="../css/public-highlights.css">
</head>
<body>
<div class="magical-bg" id="magicalBg"></div>
<?php include('../includes/conn.php'); ?>

<header>
    <div class="header-inner">
        <div style="display:flex;align-items:center;gap:1rem;">
            <span class="logo-moon">🌙</span>
            <span class="logo-text">SAILOR MOON</span>
        </div>
        <nav>
            <a href="public_home.php"       class="nav-link nl1">🏠 Home</a>
            <a href="public_overview.php"   class="nav-link nl2">📖 Overview</a>
            <a href="public_highlights.php" class="nav-link nl3">⭐ Highlights</a>
            <a href="public_media.php"      class="nav-link nl4">🎬 Media</a>
            <a href="public_contact.php"    class="nav-link nl5">💌 Contact</a>
        </nav>
    </div>
</header>

<div class="page-wrap">
    <h1 class="page-title">✨ Iconic Highlights ✨</h1>
    <p class="page-sub">Relive the most magical moments from Sailor Moon!</p>

    <div class="highlights-grid">
    <?php
    $q = mysqli_query($conn, "SELECT * FROM $tablehighlight ORDER BY display_order ASC");
    if (mysqli_num_rows($q) === 0) {
        echo "<p style='text-align:center;color:#aaa;padding:3rem;grid-column:1/-1;'>No highlights yet. Check back soon! 🌙</p>";
    }
    while ($r = mysqli_fetch_assoc($q)):
    ?>
        <div class="highlight-card">
            <?php if (!empty($r['image_path'])): ?>
                <img src="<?= htmlspecialchars($r['image_path']) ?>"
                     alt="<?= htmlspecialchars($r['title']) ?>"
                     class="highlight-img"
                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <div class="highlight-img-fallback" style="display:none;">⭐</div>
            <?php else: ?>
                <div class="highlight-img-fallback">⭐</div>
            <?php endif; ?>
            <div class="highlight-body">
                <h3 class="highlight-title"><?= htmlspecialchars($r['title']) ?></h3>
                <p class="highlight-desc"><?= htmlspecialchars($r['description']) ?></p>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>

<footer>© 2026 Sailor Moon Fan Website. All Rights Reserved. 🌙 | Sailor Moon © Naoko Takeuchi</footer>
<script>
    const bg = document.getElementById('magicalBg');
    const emojis = ['✨','⭐','💫','💖','🌙'];
    for (let i = 0; i < 15; i++) {
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
