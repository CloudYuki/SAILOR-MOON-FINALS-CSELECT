<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Sailor Moon — Media Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/public-shared.css">
    <link rel="stylesheet" href="../css/public-media.css">
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
    <h1 class="page-title">🎬 Gallery Collection</h1>
    <p class="page-sub">* Screenshots, posters, and fan art</p>
    <div class="gallery-grid">
    <?php
    $q = mysqli_query($conn, "SELECT * FROM $tablemedia ORDER BY display_order ASC");
    if (mysqli_num_rows($q) === 0) echo "<p style='color:#aaa;text-align:center;padding:3rem;grid-column:1/-1;'>No media yet. 🎬</p>";
    while ($r = mysqli_fetch_assoc($q)):
    ?>
        <div class="gallery-item" onclick="openLightbox('<?= htmlspecialchars($r['image_path']) ?>')">
            <img src="<?= htmlspecialchars($r['image_path']) ?>"
                 alt="<?= htmlspecialchars($r['caption']) ?>"
                 onerror="this.src='https://via.placeholder.com/300x225/ff6fb5/ffffff?text=🌙'">
            <div class="gallery-overlay">
                <span class="gallery-caption"><?= htmlspecialchars($r['caption']) ?></span>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>

<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <img id="lightboxImg" src="" alt="">
</div>

<footer>© 2026 Sailor Moon Fan Website. All Rights Reserved. 🌙 | Sailor Moon © Naoko Takeuchi</footer>

<script>
    function openLightbox(src) {
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightbox').classList.add('active');
    }
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
    }
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
