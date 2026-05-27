<?php
include('../includes/session.php');
include('../includes/conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $slug    = mysqli_real_escape_string($conn, trim($_POST['slug']));
    $name    = mysqli_real_escape_string($conn, trim($_POST['name']));
    $origin  = mysqli_real_escape_string($conn, trim($_POST['origin_text']));
    $planet  = mysqli_real_escape_string($conn, trim($_POST['planet']));
    $weapon  = mysqli_real_escape_string($conn, trim($_POST['weapon']));
    $element = mysqli_real_escape_string($conn, trim($_POST['element']));
    $color   = mysqli_real_escape_string($conn, trim($_POST['color']));
    $image   = mysqli_real_escape_string($conn, trim($_POST['image_path']));
    $order   = (int)$_POST['display_order'];

    $sql = "INSERT INTO $tablechar (slug,name,origin_text,planet,weapon,element,color,image_path,display_order)
            VALUES ('$slug','$name','$origin','$planet','$weapon','$element','$color','$image',$order)";

    if (mysqli_query($conn, $sql)) {
        $char_id   = mysqli_insert_id($conn);
        $abilities = array_filter(array_map('trim', explode("\n", $_POST['abilities'])));
        foreach ($abilities as $i => $ab) {
            $ab = mysqli_real_escape_string($conn, $ab);
            mysqli_query($conn, "INSERT INTO $tableability (character_id,ability_name,display_order) VALUES ($char_id,'$ab',".($i+1).")");
        }
        $_SESSION['status'] = "✅ Character '{$_POST['name']}' added successfully! 🌙";
        header('Location: index.php');
        exit;
    } else {
        $error = "Failed: " . mysqli_error($conn);
    }
}
?>
<?php include('../includes/header.php'); ?>
<div class="page-wrap">
    <div class="section-card" style="max-width:700px; margin:0 auto;">
        <h2 class="section-title">✨ Add New Character</h2>

        <?php if (isset($error)): ?>
            <div class="sm-alert sm-alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="sm-label">🌙 Name</label>
                    <input type="text" class="sm-input" name="name" placeholder="e.g. Sailor Moon" required>
                </div>
                <div class="col-md-6">
                    <label class="sm-label">🔑 Slug (unique key)</label>
                    <input type="text" class="sm-input" name="slug" placeholder="e.g. moon" required>
                </div>
                <div class="col-md-6">
                    <label class="sm-label">🪐 Planet</label>
                    <input type="text" class="sm-input" name="planet" placeholder="e.g. Moon">
                </div>
                <div class="col-md-6">
                    <label class="sm-label">⚡ Element</label>
                    <input type="text" class="sm-input" name="element" placeholder="e.g. Love & Justice">
                </div>
                <div class="col-md-6">
                    <label class="sm-label">⚔️ Weapon</label>
                    <input type="text" class="sm-input" name="weapon" placeholder="e.g. Moon Stick">
                </div>
                <div class="col-md-6">
                    <label class="sm-label">🎨 Color</label>
                    <input type="text" class="sm-input" name="color" placeholder="e.g. Pink & White">
                </div>
                <div class="col-12">
                    <label class="sm-label">🖼 Image Path</label>
                    <input type="text" class="sm-input" name="image_path" placeholder="e.g. ../assets/profiles/moon.png">
                </div>
                <div class="col-md-4">
                    <label class="sm-label">🔢 Display Order</label>
                    <input type="number" class="sm-input" name="display_order" value="0">
                </div>
                <div class="col-12">
                    <label class="sm-label">📖 Origin / Background</label>
                    <textarea class="sm-input" name="origin_text" placeholder="Character background story..."></textarea>
                </div>
                <div class="col-12">
                    <label class="sm-label">⭐ Abilities (one per line)</label>
                    <textarea class="sm-input" name="abilities" rows="5" placeholder="Moon Prism Power&#10;Moon Tiara Action&#10;Healing Powers"></textarea>
                </div>
                <div class="col-12" style="display:flex; gap:1rem; flex-wrap:wrap;">
                    <button type="submit" class="btn-submit">✨ Add Character</button>
                    <a href="index.php" class="btn-sm-red" style="padding:.8rem 1.5rem; text-decoration:none; display:inline-flex; align-items:center;">← Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<footer>© 2026 Sailor Moon Fan Website — Admin Panel 🌙</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
