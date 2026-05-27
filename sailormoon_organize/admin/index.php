<?php
include('../includes/session.php');
include('../includes/conn.php');
?>
<?php include('../includes/header.php'); ?>

<div class="page-wrap">

    <?php
    if (isset($_SESSION['status'])) {
        $cls = strpos($_SESSION['status'],'❌') !== false ? 'sm-alert-danger' : 'sm-alert-success';
        echo "<div class='sm-alert $cls'>{$_SESSION['status']}</div>";
        unset($_SESSION['status']);
    }
    ?>

    <!-- STAT CARDS -->
    <?php
    $cCount   = mysqli_num_rows(mysqli_query($conn, "SELECT character_id FROM $tablechar"));
    $hCount   = mysqli_num_rows(mysqli_query($conn, "SELECT highlight_id FROM $tablehighlight"));
    $mCount   = mysqli_num_rows(mysqli_query($conn, "SELECT media_id FROM $tablemedia"));
    $msgCount = mysqli_num_rows(mysqli_query($conn, "SELECT message_id FROM $tablecontact WHERE is_read=0"));
    ?>
    <div class="stat-grid">
        <div class="stat-card"><div class="stat-icon">👥</div><div class="stat-num"><?= $cCount ?></div><div class="stat-lbl">Characters</div></div>
        <div class="stat-card"><div class="stat-icon">⭐</div><div class="stat-num"><?= $hCount ?></div><div class="stat-lbl">Highlights</div></div>
        <div class="stat-card"><div class="stat-icon">🎬</div><div class="stat-num"><?= $mCount ?></div><div class="stat-lbl">Media Items</div></div>
        <div class="stat-card"><div class="stat-icon">💌</div><div class="stat-num"><?= $msgCount ?></div><div class="stat-lbl">Unread Messages</div></div>
    </div>

    <!-- CHARACTER LIST -->
    <div class="section-card">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem; margin-bottom:1.2rem;">
            <h2 class="section-title" style="margin:0;">👥 Sailor Scout Characters</h2>
            <a href="add.php" class="btn-submit" style="text-decoration:none;">✨ Add New Character</a>
        </div>

        <table class="sm-table">
            <thead>
                <tr>
                    <th>#</th><th>Name</th><th>Planet</th><th>Element</th><th>Weapon</th><th>Color</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM $tablechar ORDER BY display_order ASC");
            if (mysqli_num_rows($q) === 0) {
                echo "<tr><td colspan='7' style='text-align:center;color:#aaa;padding:2rem;'>No characters yet. Add one! 🌙</td></tr>";
            }
            while ($row = mysqli_fetch_assoc($q)):
            ?>
            <tr>
                <td><?= $row['character_id'] ?></td>
                <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                <td><?= htmlspecialchars($row['planet']) ?></td>
                <td><?= htmlspecialchars($row['element']) ?></td>
                <td><?= htmlspecialchars($row['weapon']) ?></td>
                <td><?= htmlspecialchars($row['color']) ?></td>
                <td style="white-space:nowrap;">
                    <a href="edit.php?id=<?= $row['character_id'] ?>" class="btn-sm-blue">✏️ Edit</a>
                    &nbsp;
                    <a href="delete.php?id=<?= $row['character_id'] ?>"
                       class="btn-sm-red"
                       onclick="return confirm('Delete <?= htmlspecialchars($row['name']) ?>? This cannot be undone!');">
                        🗑 Delete
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>

<footer>© 2026 Sailor Moon Fan Website — Admin Panel 🌙 | Made with 💖 for fans worldwide</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
