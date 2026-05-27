<?php
include('../includes/session.php');
include('../includes/conn.php');

if (isset($_POST['add_media'])) {
    $caption = mysqli_real_escape_string($conn, trim($_POST['caption']));
    $img     = mysqli_real_escape_string($conn, trim($_POST['image_path']));
    $order   = (int)$_POST['display_order'];
    mysqli_query($conn, "INSERT INTO $tablemedia (caption,image_path,display_order) VALUES ('$caption','$img',$order)");
    $_SESSION['status'] = "✅ Media item added!";
    header('Location: media.php'); exit;
}

if (isset($_POST['edit_media'])) {
    $id      = (int)$_POST['media_id'];
    $caption = mysqli_real_escape_string($conn, trim($_POST['caption']));
    $img     = mysqli_real_escape_string($conn, trim($_POST['image_path']));
    $order   = (int)$_POST['display_order'];
    mysqli_query($conn, "UPDATE $tablemedia SET caption='$caption',image_path='$img',display_order=$order WHERE media_id=$id");
    $_SESSION['status'] = "✅ Media updated!";
    header('Location: media.php'); exit;
}

if (isset($_GET['delete'])) {
    mysqli_query($conn, "DELETE FROM $tablemedia WHERE media_id=" . (int)$_GET['delete']);
    $_SESSION['status'] = "✅ Media item deleted.";
    header('Location: media.php'); exit;
}

$editRow = null;
if (isset($_GET['edit'])) {
    $r = mysqli_query($conn, "SELECT * FROM $tablemedia WHERE media_id=" . (int)$_GET['edit']);
    $editRow = mysqli_fetch_assoc($r);
}
?>
<?php include('../includes/header.php'); ?>
<div class="page-wrap">

    <?php if (isset($_SESSION['status'])): ?>
        <div class="sm-alert sm-alert-success"><?= $_SESSION['status'] ?></div>
        <?php unset($_SESSION['status']); ?>
    <?php endif; ?>

    <div class="section-card" style="max-width:600px; margin-bottom:2rem;">
        <h2 class="section-title"><?= $editRow ? '✏️ Edit Media' : '🎬 Add Media' ?></h2>
        <form method="POST" action="">
            <?php if ($editRow): ?>
                <input type="hidden" name="media_id" value="<?= $editRow['media_id'] ?>">
            <?php endif; ?>
            <div class="row g-3">
                <div class="col-12">
                    <label class="sm-label">💬 Caption</label>
                    <input type="text" class="sm-input" name="caption" value="<?= $editRow ? htmlspecialchars($editRow['caption']) : '' ?>" required>
                </div>
                <div class="col-md-8">
                    <label class="sm-label">🖼 Image Path</label>
                    <input type="text" class="sm-input" name="image_path" value="<?= $editRow ? htmlspecialchars($editRow['image_path']) : '' ?>" placeholder="../assets/media/image.gif" required>
                </div>
                <div class="col-md-4">
                    <label class="sm-label">🔢 Order</label>
                    <input type="number" class="sm-input" name="display_order" value="<?= $editRow ? (int)$editRow['display_order'] : '0' ?>">
                </div>
                <div class="col-12" style="display:flex;gap:1rem;flex-wrap:wrap;">
                    <button type="submit" name="<?= $editRow ? 'edit_media' : 'add_media' ?>" class="btn-submit">
                        <?= $editRow ? '✅ Update Media' : '🎬 Add Media' ?>
                    </button>
                    <?php if ($editRow): ?>
                        <a href="media.php" class="btn-sm-red" style="padding:.8rem 1.5rem;text-decoration:none;display:inline-flex;align-items:center;">← Cancel</a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>

    <div class="section-card">
        <h2 class="section-title">🎬 Gallery Media</h2>
        <table class="sm-table">
            <thead><tr><th>#</th><th>Caption</th><th>Image Path</th><th>Order</th><th>Actions</th></tr></thead>
            <tbody>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM $tablemedia ORDER BY display_order ASC");
            if (mysqli_num_rows($q) === 0) echo "<tr><td colspan='5' style='text-align:center;color:#aaa;padding:2rem;'>No media yet. 🎬</td></tr>";
            while ($r = mysqli_fetch_assoc($q)):
            ?>
            <tr>
                <td><?= $r['media_id'] ?></td>
                <td><?= htmlspecialchars($r['caption']) ?></td>
                <td><small><?= htmlspecialchars($r['image_path']) ?></small></td>
                <td><?= $r['display_order'] ?></td>
                <td style="white-space:nowrap;">
                    <a href="media.php?edit=<?= $r['media_id'] ?>" class="btn-sm-blue">✏️ Edit</a>
                    &nbsp;
                    <a href="media.php?delete=<?= $r['media_id'] ?>" class="btn-sm-red" onclick="return confirm('Delete?');">🗑 Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<footer>© 2026 Sailor Moon Fan Website — Admin Panel 🌙</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
