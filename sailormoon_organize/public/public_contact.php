<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Sailor Moon — Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/public-shared.css">
    <link rel="stylesheet" href="../css/public-contact.css">
</head>
<body>
<div class="magical-bg" id="magicalBg"></div>
<?php
include('../includes/conn.php');

$success = '';
$error   = '';

if (isset($_POST['send_message'])) {
    $name    = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email   = mysqli_real_escape_string($conn, trim($_POST['email']));
    $subject = mysqli_real_escape_string($conn, trim($_POST['subject']));
    $message = mysqli_real_escape_string($conn, trim($_POST['message']));

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = "⚠️ Please fill in all fields before sending!";
    } else {
        $sql = "INSERT INTO $tablecontact (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";
        if (mysqli_query($conn, $sql)) {
            $success = "✨ Thank you for your message, {$name}! We'll get back to you soon! 🌙💖";
        } else {
            $error = "Failed to send: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['subscribe'])) {
    $subEmail = mysqli_real_escape_string($conn, trim($_POST['sub_email']));
    if (!empty($subEmail)) {
        $check = mysqli_query($conn, "SELECT subscriber_id FROM $tablenews WHERE email='$subEmail'");
        if (mysqli_num_rows($check) > 0) {
            $success = "💖 You're already subscribed! Stay magical! 🌙";
        } else {
            mysqli_query($conn, "INSERT INTO $tablenews (email) VALUES ('$subEmail')");
            $success = "✨ Thank you for subscribing! Stay magical! 💖🌙";
        }
    }
}
?>

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

<div class="page-wrap" style="max-width:780px;">
    <span class="contact-icon">💌</span>
    <h1 class="page-title">Contact Us</h1>
    <p class="page-sub">We'd love to hear from you! Send us a message. 💖</p>

    <?php if ($success): ?><div class="sm-alert sm-alert-success"><?= $success ?></div><?php endif; ?>
    <?php if ($error):   ?><div class="sm-alert sm-alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>

    <div class="contact-form-card">
        <form method="POST" action="">
            <div class="row g-3">
                <div class="col-12">
                    <label class="sm-label">Name ✨</label>
                    <input type="text" class="sm-input" name="name" placeholder="Your magical name..." required>
                </div>
                <div class="col-12">
                    <label class="sm-label">Email 💖</label>
                    <input type="email" class="sm-input" name="email" placeholder="your.email@example.com" required>
                </div>
                <div class="col-12">
                    <label class="sm-label">Subject 🌙</label>
                    <input type="text" class="sm-input" name="subject" placeholder="What's this about?" required>
                </div>
                <div class="col-12">
                    <label class="sm-label">Message 💫</label>
                    <textarea class="sm-input" name="message" placeholder="Share your thoughts with us..."></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" name="send_message" class="btn-submit">Send Message ✨</button>
                </div>
            </div>
        </form>
    </div>

    <div class="info-cards">
        <div class="info-card">
            <div class="info-card-icon">📧</div>
            <div class="info-card-title">Official Website</div>
            <div class="info-card-text">sailormoon-official.com</div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">🌍</div>
            <div class="info-card-title">Location</div>
            <div class="info-card-text">Tokyo, Japan</div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">⏰</div>
            <div class="info-card-title">Response Time</div>
            <div class="info-card-text">Within 24 hours</div>
        </div>
    </div>

    <div style="background:linear-gradient(135deg,#ff6fb5,#ffd56a);padding:2rem;border-radius:25px;text-align:center;margin-top:2rem;color:#fff;">
        <h4 style="font-family:'Bubblegum Sans',cursive;font-size:1.5rem;margin-bottom:.4rem;">Stay Magical! 💌</h4>
        <p style="margin-bottom:1rem;opacity:.95;">Subscribe for Sailor Moon updates!</p>
        <form method="POST" action="" style="display:flex;gap:.6rem;max-width:450px;margin:0 auto;flex-wrap:wrap;justify-content:center;">
            <input type="email" name="sub_email" placeholder="Enter your email..." required
                   style="flex:1;min-width:220px;padding:.8rem 1.4rem;border-radius:50px;border:none;font-family:'Fredoka',sans-serif;font-size:1rem;outline:none;">
            <button type="submit" name="subscribe"
                    style="padding:.8rem 1.6rem;border-radius:50px;border:none;background:#fff;color:#ff6fb5;font-family:'Fredoka',sans-serif;font-weight:700;cursor:pointer;transition:all .2s;">
                Subscribe ✨
            </button>
        </form>
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
