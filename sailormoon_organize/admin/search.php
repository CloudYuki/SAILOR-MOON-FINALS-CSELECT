<?php
include('../includes/session.php');
include('../includes/conn.php');
?>
<?php include('../includes/header.php'); ?>
<div class="page-wrap">
    <div class="section-card">
        <h2 class="section-title">🔍 Search Characters</h2>

        <form method="POST" action="" class="search-row">
            <input type="text" class="sm-input" name="key"
                   placeholder="Search by name, planet, element, weapon..."
                   value="<?= isset($_POST['key']) ? htmlspecialchars($_POST['key']) : '' ?>">
            <button type="submit" name="search" class="btn-submit" style="padding:.7rem 1.8rem;">🔍 Search</button>
            <a href="search.php" class="btn-sm-gold" style="padding:.7rem 1.2rem; text-decoration:none; display:inline-flex; align-items:center;">✖ Clear</a>
        </form>

        <?php
        if (isset($_POST['search'])) {
            $key = mysqli_real_escape_string($conn, trim($_POST['key']));
            $q   = mysqli_query($conn, "
                SELECT * FROM $tablechar
                WHERE name LIKE '%$key%'
                   OR planet LIKE '%$key%'
                   OR element LIKE '%$key%'
                   OR weapon LIKE '%$key%'
                   OR color LIKE '%$key%'
                   OR origin_text LIKE '%$key%'
                ORDER BY display_order ASC
            ");
            $found = mysqli_num_rows($q);
            echo "<p style='color:#999; margin-bottom:1rem;'>Found <strong style='color:#ff6fb5;'>$found</strong> result(s) for \"" . htmlspecialchars($_POST['key']) . "\" ✨</p>";
        } else {
            $q = mysqli_query($conn, "SELECT * FROM $tablechar ORDER BY display_order ASC");
        }
        ?>

        <table class="sm-table">
            <thead>
                <tr><th>#</th><th>Name</th><th>Planet</th><th>Element</th><th>Weapon</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($q) === 0) {
                echo "<tr><td colspan='6' style='text-align:center;color:#aaa;padding:2rem;'>No results found. 🌙</td></tr>";
            }
            while ($row = mysqli_fetch_assoc($q)):
            ?>
            <tr>
                <td><?= $row['character_id'] ?></td>
                <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
                <td><?= htmlspecialchars($row['planet']) ?></td>
                <td><?= htmlspecialchars($row['element']) ?></td>
                <td><?= htmlspecialchars($row['weapon']) ?></td>
                <td style="white-space:nowrap;">
                    <a href="edit.php?id=<?= $row['character_id'] ?>" class="btn-sm-blue">✏️ Edit</a>
                    &nbsp;
                    <a href="delete.php?id=<?= $row['character_id'] ?>"
                       class="btn-sm-red"
                       onclick="return confirm('Delete <?= htmlspecialchars($row['name']) ?>?');">
                        🗑 Delete
                    </a>
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
