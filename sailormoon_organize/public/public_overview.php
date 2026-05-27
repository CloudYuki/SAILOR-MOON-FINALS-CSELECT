<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Sailor Moon — Character Profiles</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/public-shared.css">
    <link rel="stylesheet" href="../css/public-overview.css">
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

<div class="search-section">
    <form method="POST" action="" class="search-bar">
        <input type="text" class="search-input" name="key" placeholder="🔍 Search characters..."
               value="<?= isset($_POST['key']) ? htmlspecialchars($_POST['key']) : '' ?>">
        <button type="submit" name="search" class="search-btn">Search ✨</button>
    </form>
</div>

<?php
if (isset($_POST['search'])) {
    $key   = mysqli_real_escape_string($conn, trim($_POST['key']));
    $q     = mysqli_query($conn, "SELECT * FROM $tablechar WHERE name LIKE '%$key%' OR planet LIKE '%$key%' OR element LIKE '%$key%' OR weapon LIKE '%$key%' ORDER BY display_order");
    $count = mysqli_num_rows($q);
    echo "<div class='profile-wrap'><div class='search-results'>";
    echo "<div class='result-title'>🔍 {$count} result(s) for \"" . htmlspecialchars($key) . "\"</div>";
    echo "<table class='result-table'><thead><tr><th>Name</th><th>Planet</th><th>Element</th><th>Weapon</th></tr></thead><tbody>";
    if ($count === 0) echo "<tr><td colspan='4' style='text-align:center;color:#aaa;padding:1.5rem;'>No characters found. 🌙</td></tr>";
    while ($r = mysqli_fetch_assoc($q)) {
        echo "<tr><td><strong>" . htmlspecialchars($r['name']) . "</strong></td><td>" . htmlspecialchars($r['planet']) . "</td><td>" . htmlspecialchars($r['element']) . "</td><td>" . htmlspecialchars($r['weapon']) . "</td></tr>";
    }
    echo "</tbody></table></div></div>";
}

$allChars = mysqli_query($conn, "SELECT character_id, name, slug FROM $tablechar ORDER BY display_order ASC");
$charList = [];
while ($c = mysqli_fetch_assoc($allChars)) $charList[] = $c;

$activeId = isset($_GET['char']) ? (int)$_GET['char'] : ($charList[0]['character_id'] ?? 0);

$charData  = null;
$abilities = [];
if ($activeId) {
    $r        = mysqli_query($conn, "SELECT * FROM $tablechar WHERE character_id=$activeId");
    $charData = mysqli_fetch_assoc($r);
    $ab       = mysqli_query($conn, "SELECT ability_name FROM $tableability WHERE character_id=$activeId ORDER BY display_order");
    while ($a = mysqli_fetch_assoc($ab)) $abilities[] = $a['ability_name'];
}
?>

<div class="char-selector">
    <?php foreach ($charList as $c): ?>
        <a href="public_overview.php?char=<?= $c['character_id'] ?>"
           class="char-btn <?= $c['character_id'] == $activeId ? 'active' : '' ?>">
            🌙 <?= htmlspecialchars($c['name']) ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="profile-wrap">
    <?php if ($charData): ?>
    <div class="profile-card">
        <div class="char-img-wrap">
            <div style="font-size:.8rem;font-weight:700;color:#ccc;letter-spacing:2px;margin-bottom:.8rem;">CHARACTER PROFILE</div>
            <img src="<?= htmlspecialchars($charData['image_path']) ?>"
                 alt="<?= htmlspecialchars($charData['name']) ?>"
                 class="char-img"
                 onerror="this.src='https://via.placeholder.com/220/ff6fb5/ffffff?text=🌙'">
            <div class="char-name"><?= htmlspecialchars($charData['name']) ?></div>
        </div>
        <div>
            <div class="section-lbl">📖 Origin & Background</div>
            <p class="origin-text"><?= htmlspecialchars($charData['origin_text']) ?></p>

            <div class="section-lbl">⭐ Character Abilities</div>
            <ul class="ability-list">
                <?php foreach ($abilities as $ab): ?>
                    <li><?= htmlspecialchars($ab) ?></li>
                <?php endforeach; ?>
                <?php if (empty($abilities)): ?>
                    <li style="color:#ccc;">No abilities listed yet.</li>
                <?php endif; ?>
            </ul>

            <div class="section-lbl">📊 Profile Stats</div>
            <div class="stats-grid">
                <div class="stat-box"><div class="stat-box-label">🪐 Planet</div><div class="stat-box-value"><?= htmlspecialchars($charData['planet']) ?></div></div>
                <div class="stat-box"><div class="stat-box-label">⚔️ Weapon</div><div class="stat-box-value"><?= htmlspecialchars($charData['weapon']) ?></div></div>
                <div class="stat-box"><div class="stat-box-label">⚡ Element</div><div class="stat-box-value"><?= htmlspecialchars($charData['element']) ?></div></div>
                <div class="stat-box"><div class="stat-box-label">🎨 Color</div><div class="stat-box-value"><?= htmlspecialchars($charData['color']) ?></div></div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <p style="text-align:center;color:#aaa;padding:3rem;">No characters in database yet. 🌙</p>
    <?php endif; ?>
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
