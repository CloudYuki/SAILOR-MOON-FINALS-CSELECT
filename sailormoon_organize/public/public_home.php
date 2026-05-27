<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Sailor Moon Fan Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/public-shared.css">
    <link rel="stylesheet" href="../css/public-home.css">
</head>
<body>
<div class="magical-bg" id="magicalBg"></div>
<?php
include('../includes/conn.php');

$nl_success = '';
if (isset($_POST['subscribe'])) {
    $sub_email = mysqli_real_escape_string($conn, trim($_POST['sub_email']));
    if (!empty($sub_email)) {
        $check = mysqli_query($conn, "SELECT subscriber_id FROM $tablenews WHERE email='$sub_email'");
        if (mysqli_num_rows($check) > 0) {
            $nl_success = "💖 You're already subscribed! Stay magical! 🌙";
        } else {
            mysqli_query($conn, "INSERT INTO $tablenews (email) VALUES ('$sub_email')");
            $nl_success = "✨ Thank you for subscribing! Stay magical! 💖🌙";
        }
    }
}

$charCount = mysqli_num_rows(mysqli_query($conn, "SELECT character_id FROM $tablechar"));
$hlCount   = mysqli_num_rows(mysqli_query($conn, "SELECT highlight_id FROM $tablehighlight"));
$medCount  = mysqli_num_rows(mysqli_query($conn, "SELECT media_id FROM $tablemedia"));
?>

<header>
    <div class="header-inner">
        <a href="public_home.php" class="logo-area">
            <span class="logo-moon">🌙</span>
            <span class="logo-text">SAILOR MOON</span>
        </a>
        <nav>
            <a href="public_home.php"       class="nav-link nl1">🏠 Home</a>
            <a href="public_overview.php"   class="nav-link nl2">📖 Overview</a>
            <a href="public_highlights.php" class="nav-link nl3">⭐ Highlights</a>
            <a href="public_media.php"      class="nav-link nl4">🎬 Media</a>
            <a href="public_contact.php"    class="nav-link nl5">💌 Contact</a>
        </nav>
    </div>
</header>

<section class="hero">
    <span class="hero-moon">🌙</span>
    <h1 class="hero-title">Sailor Moon</h1>
    <p class="hero-quote">"In the name of the moon, I will punish you!"</p>
    <p class="hero-quote" style="font-size:1rem;color:#aaa;">月に変わってお仕置きよ</p>
</section>

<div class="intro">
    <p class="intro-label">SAILOR MOON</p>
    <h3 class="intro-title">Welcome to the Sailor Moon Website</h3>
    <p class="intro-text">Sailor Moon is a classic magical girl anime series created by Naoko Takeuchi that follows Usagi Tsukino, an ordinary teenage girl who transforms into Sailor Moon to protect the world from evil forces. Blending action, friendship, romance, and fantasy, the series has become a global icon known for its empowering themes and memorable characters. 🌙✨</p>
</div>

<div class="stats-row">
    <div class="stat-card"><div class="stat-icon">👥</div><div class="stat-num"><?= $charCount ?></div><div class="stat-lbl">Sailor Scouts</div></div>
    <div class="stat-card"><div class="stat-icon">⭐</div><div class="stat-num"><?= $hlCount ?></div><div class="stat-lbl">Highlights</div></div>
    <div class="stat-card"><div class="stat-icon">🎬</div><div class="stat-num"><?= $medCount ?></div><div class="stat-lbl">Gallery Items</div></div>
    <div class="stat-card"><div class="stat-icon">🌙</div><div class="stat-num">5</div><div class="stat-lbl">Seasons</div></div>
</div>

<div class="quick-links">
    <a href="public_overview.php" class="quick-card">
        <span class="quick-icon">📖</span>
        <div class="quick-title">Character Profiles</div>
        <div class="quick-desc">Meet all <?= $charCount ?> Sailor Scouts</div>
    </a>
    <a href="public_highlights.php" class="quick-card">
        <span class="quick-icon">⭐</span>
        <div class="quick-title">Iconic Highlights</div>
        <div class="quick-desc"><?= $hlCount ?> magical moments</div>
    </a>
    <a href="public_media.php" class="quick-card">
        <span class="quick-icon">🎬</span>
        <div class="quick-title">Media Gallery</div>
        <div class="quick-desc"><?= $medCount ?> images & GIFs</div>
    </a>
    <a href="public_contact.php" class="quick-card">
        <span class="quick-icon">💌</span>
        <div class="quick-title">Contact Us</div>
        <div class="quick-desc">Send us a message</div>
    </a>
</div>

<?php if ($nl_success): ?>
    <div class="sm-alert sm-alert-success" style="max-width:600px;margin:0 auto 2rem;"><?= $nl_success ?></div>
<?php endif; ?>

<footer>
    <div class="footer-inner">
        <h3 class="footer-title">Connect With Us!</h3>
        <div class="social-links">
            <a href="https://www.facebook.com/sailorfanclub"          class="social-icon s-fb" title="Facebook">📘</a>
            <a href="https://x.com/Ochibawolf"                        class="social-icon s-tw" title="Twitter">🐦</a>
            <a href="https://www.instagram.com/sailormoon_sc/"         class="social-icon s-ig" title="Instagram">📷</a>
            <a href="https://www.youtube.com/@sailormoonofficialch"    class="social-icon s-yt" title="YouTube">📺</a>
            <a href="https://sailormoon-official.com/"                 class="social-icon s-wb" target="_blank" title="Official Website">🌐</a>
        </div>
        <div class="footer-links">
            <a href="public_home.php"       class="footer-link">Home</a>
            <a href="public_overview.php"   class="footer-link">Overview</a>
            <a href="public_highlights.php" class="footer-link">Highlights</a>
            <a href="public_media.php"      class="footer-link">Media</a>
        </div>
        <div class="newsletter-box">
            <h4>Stay Magical! 💌</h4>
            <p>Subscribe for Sailor Moon updates!</p>
            <form method="POST" action="" class="nl-form">
                <input type="email" name="sub_email" class="nl-input" placeholder="Enter your email..." required>
                <button type="submit" name="subscribe" class="nl-btn">Subscribe ✨</button>
            </form>
        </div>
        <div class="copyright">
            <p>© 2026 Sailor Moon Fan Website. All Rights Reserved.</p>
            <p>Made with 💖 for fans worldwide</p>
            <p style="margin-top:.4rem;">Sailor Moon © Naoko Takeuchi</p>
        </div>
    </div>
</footer>

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
