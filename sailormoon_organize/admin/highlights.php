<?php
include('../includes/session.php');
include('../includes/conn.php');

if (isset($_POST['add_highlight'])) {
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $desc  = mysqli_real_escape_string($conn, trim($_POST['description']));
    $img   = mysqli_real_escape_string($conn, trim($_POST['image_path']));
    $order = (int)$_POST['display_order'];
    mysqli_query($conn, "INSERT INTO $tablehighlight (title,description,image_path,display_order) VALUES ('$title','$desc','$img',$order)");
    $_SESSION['status'] = "✅ Highlight added!";
    header('Location: highlights.php'); exit;
}

if (isset($_POST['edit_highlight'])) {
    $id    = (int)$_POST['highlight_id'];
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $desc  = mysqli_real_escape_string($conn, trim($_POST['description']));
    $img   = mysqli_real_escape_string($conn, trim($_POST['image_path']));
    $order = (int)$_POST['display_order'];
    mysqli_query($conn, "UPDATE $tablehighlight SET title='$title',description='$desc',image_path='$img',display_order=$order WHERE highlight_id=$id");
    $_SESSION['status'] = "✅ Highlight updated!";
    header('Location: highlights.php'); exit;
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM $tablehighlight WHERE highlight_id=$id");
    $_SESSION['status'] = "✅ Highlight deleted.";
    header('Location: highlights.php'); exit;
}

$editRow = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $r  = mysqli_query($conn, "SELECT * FROM $tablehighlight WHERE highlight_id=$id");
    $editRow = mysqli_fetch_assoc($r);
}
?>
<?php include('../includes/header.php'); ?>
<div class="page-wrap">

    <?php if (isset($_SESSION['status'])): ?>
        <div class="sm-alert sm-alert-success"><?= $_SESSION['status'] ?></div>
        <?php unset($_SESSION['status']); ?>
    <?php endif; ?>

    <div class="section-card" style="max-width:680px; margin-bottom:2rem;">
        <h2 class="section-title"><?= $editRow ? '✏️ Edit Highlight' : '✨ Add Highlight' ?></h2>
        <form method="POST" action="">
            <?php if ($editRow): ?>
                <input type="hidden" name="highlight_id" value="<?= $editRow['highlight_id'] ?>">
            <?php endif; ?>
            <div class="row g-3">
                <div class="col-12">
                    <label class="sm-label">⭐ Title</label>
                    <input type="text" class="sm-input" name="title" value="<?= $editRow ? htmlspecialchars($editRow['title']) : '' ?>" required>
                </div>
                <div class="col-12">
                    <label class="sm-label">📝 Description</label>
                    <textarea class="sm-input" name="description"><?= $editRow ? htmlspecialchars($editRow['description']) : '' ?></textarea>
                </div>
                <div class="col-md-8">
                    <label class="sm-label">🖼 Image Path</label>
                    <input type="text" class="sm-input" name="image_path" value="<?= $editRow ? htmlspecialchars($editRow['image_path']) : '' ?>" placeholder="../assets/highlights/image.gif">
                </div>
                <div class="col-md-4">
                    <label class="sm-label">🔢 Display Order</label>
                    <input type="number" class="sm-input" name="display_order" value="<?= $editRow ? (int)$editRow['display_order'] : '0' ?>">
                </div>
                <div class="col-12" style="display:flex;gap:1rem;flex-wrap:wrap;">
                    <button type="submit" name="<?= $editRow ? 'edit_highlight' : 'add_highlight' ?>" class="btn-submit">
                        <?= $editRow ? '✅ Update Highlight' : '✨ Add Highlight' ?>
                    </button>
                    <?php if ($editRow): ?>
                        <a href="highlights.php" class="btn-sm-red" style="padding:.8rem 1.5rem;text-decoration:none;display:inline-flex;align-items:center;">← Cancel</a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>

    <div class="section-card">
        <h2 class="section-title">⭐ All Highlights</h2>
        <table class="sm-table">
            <thead>
                <tr><th>#</th><th>Title</th><th>Image Path</th><th>Order</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM $tablehighlight ORDER BY display_order ASC");
            if (mysqli_num_rows($q) === 0) echo "<tr><td colspan='5' style='text-align:center;color:#aaa;padding:2rem;'>No highlights yet. ⭐</td></tr>";
            while ($r = mysqli_fetch_assoc($q)):
            ?>
            <tr>
                <td><?= $r['highlight_id'] ?></td>
                <td><strong><?= htmlspecialchars($r['title']) ?></strong><br><small style="color:#aaa;"><?= htmlspecialchars(substr($r['description'],0,60)) ?>...</small></td>
                <td><small><?= htmlspecialchars($r['image_path']) ?></small></td>
                <td><?= $r['display_order'] ?></td>
                <td style="white-space:nowrap;">
                    <a href="highlights.php?edit=<?= $r['highlight_id'] ?>" class="btn-sm-blue">✏️ Edit</a>
                    &nbsp;
                    <a href="highlights.php?delete=<?= $r['highlight_id'] ?>" class="btn-sm-red" onclick="return confirm('Delete this highlight?');">🗑 Delete</a>
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
