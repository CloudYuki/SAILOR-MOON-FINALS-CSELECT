<?php
include('../includes/session.php');
include('../includes/conn.php');

$id    = (int)$_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM $tablechar WHERE character_id=$id");
if (!$query || mysqli_num_rows($query) === 0) {
    $_SESSION['status'] = "❌ Character not found.";
    header('Location: index.php'); exit;
}
$row = mysqli_fetch_assoc($query);

// Fetch abilities
$abQuery   = mysqli_query($conn, "SELECT ability_name FROM $tableability WHERE character_id=$id ORDER BY display_order");
$abilities = [];
while ($ab = mysqli_fetch_assoc($abQuery)) $abilities[] = $ab['ability_name'];

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

    $update = mysqli_query($conn, "UPDATE $tablechar SET
        slug='$slug', name='$name', origin_text='$origin',
        planet='$planet', weapon='$weapon', element='$element',
        color='$color', image_path='$image', display_order=$order
        WHERE character_id=$id");

    if ($update) {
        mysqli_query($conn, "DELETE FROM $tableability WHERE character_id=$id");
        $newAbilities = array_filter(array_map('trim', explode("\n", $_POST['abilities'])));
        foreach ($newAbilities as $i => $ab) {
            $ab = mysqli_real_escape_string($conn, $ab);
            mysqli_query($conn, "INSERT INTO $tableability (character_id,ability_name,display_order) VALUES ($id,'$ab',".($i+1).")");
        }
        $_SESSION['status'] = "✅ Character '{$_POST['name']}' updated successfully!";
        header('Location: index.php'); exit;
    } else {
        $error = "Update failed: " . mysqli_error($conn);
    }
}
?>
<?php include('../includes/header.php'); ?>
<div class="page-wrap">
    <div class="section-card" style="max-width:700px; margin:0 auto;">
        <h2 class="section-title">✏️ Edit Character</h2>

        <?php if (isset($error)): ?>
            <div class="sm-alert sm-alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="sm-label">🌙 Name</label>
                    <input type="text" class="sm-input" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="sm-label">🔑 Slug</label>
                    <input type="text" class="sm-input" name="slug" value="<?= htmlspecialchars($row['slug']) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="sm-label">🪐 Planet</label>
                    <input type="text" class="sm-input" name="planet" value="<?= htmlspecialchars($row['planet']) ?>">
                </div>
                <div class="col-md-6">
                    <label class="sm-label">⚡ Element</label>
                    <input type="text" class="sm-input" name="element" value="<?= htmlspecialchars($row['element']) ?>">
                </div>
                <div class="col-md-6">
                    <label class="sm-label">⚔️ Weapon</label>
                    <input type="text" class="sm-input" name="weapon" value="<?= htmlspecialchars($row['weapon']) ?>">
                </div>
                <div class="col-md-6">
                    <label class="sm-label">🎨 Color</label>
                    <input type="text" class="sm-input" name="color" value="<?= htmlspecialchars($row['color']) ?>">
                </div>
                <div class="col-12">
                    <label class="sm-label">🖼 Image Path</label>
                    <input type="text" class="sm-input" name="image_path" value="<?= htmlspecialchars($row['image_path']) ?>">
                </div>
                <div class="col-md-4">
                    <label class="sm-label">🔢 Display Order</label>
                    <input type="number" class="sm-input" name="display_order" value="<?= (int)$row['display_order'] ?>">
                </div>
                <div class="col-12">
                    <label class="sm-label">📖 Origin / Background</label>
                    <textarea class="sm-input" name="origin_text"><?= htmlspecialchars($row['origin_text']) ?></textarea>
                </div>
                <div class="col-12">
                    <label class="sm-label">⭐ Abilities (one per line)</label>
                    <textarea class="sm-input" name="abilities" rows="5"><?= htmlspecialchars(implode("\n", $abilities)) ?></textarea>
                </div>
                <div class="col-12" style="display:flex; gap:1rem; flex-wrap:wrap;">
                    <button type="submit" class="btn-submit">✅ Update Character</button>
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
