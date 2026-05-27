<?php
include('../includes/session.php');
include('../includes/conn.php');

if (isset($_GET['read'])) {
    mysqli_query($conn, "UPDATE $tablecontact SET is_read=1 WHERE message_id=" . (int)$_GET['read']);
    header('Location: messages.php'); exit;
}

if (isset($_GET['delete'])) {
    mysqli_query($conn, "DELETE FROM $tablecontact WHERE message_id=" . (int)$_GET['delete']);
    $_SESSION['status'] = "✅ Message deleted.";
    header('Location: messages.php'); exit;
}
?>
<?php include('../includes/header.php'); ?>
<div class="page-wrap">

    <?php if (isset($_SESSION['status'])): ?>
        <div class="sm-alert sm-alert-success"><?= $_SESSION['status'] ?></div>
        <?php unset($_SESSION['status']); ?>
    <?php endif; ?>

    <!-- NEWSLETTER SUBSCRIBERS -->
    <div class="section-card" style="margin-bottom:2rem;">
        <h2 class="section-title">📧 Newsletter Subscribers</h2>
        <table class="sm-table">
            <thead>
                <tr><th>#</th><th>Email</th><th>Subscribed</th><th>Status</th></tr>
            </thead>
            <tbody>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM $tablenews ORDER BY subscribed_at DESC");
            if (mysqli_num_rows($q) === 0) {
                echo "<tr><td colspan='4' style='text-align:center;color:#aaa;padding:2rem;'>No subscribers yet. 💌</td></tr>";
            }
            while ($r = mysqli_fetch_assoc($q)):
            ?>
            <tr>
                <td><?= $r['subscriber_id'] ?></td>
                <td><?= htmlspecialchars($r['email']) ?></td>
                <td><?= date('M d, Y', strtotime($r['subscribed_at'])) ?></td>
                <td>
                    <?php if ($r['is_active']): ?>
                        <span style="color:#28a745;font-weight:600;">✅ Active</span>
                    <?php else: ?>
                        <span style="color:#aaa;">❌ Inactive</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- CONTACT MESSAGES -->
    <div class="section-card">
        <h2 class="section-title">💌 Contact Messages</h2>
        <table class="sm-table">
            <thead>
                <tr><th>#</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM $tablecontact ORDER BY submitted_at DESC");
            if (mysqli_num_rows($q) === 0) {
                echo "<tr><td colspan='7' style='text-align:center;color:#aaa;padding:2rem;'>No messages yet. 💌</td></tr>";
            }
            while ($r = mysqli_fetch_assoc($q)):
            ?>
            <tr style="<?= !$r['is_read'] ? 'background:#fff8fc;font-weight:600;' : '' ?>">
                <td><?= $r['message_id'] ?></td>
                <td><?= htmlspecialchars($r['name']) ?></td>
                <td><?= htmlspecialchars($r['email']) ?></td>
                <td>
                    <?= htmlspecialchars($r['subject']) ?>
                    <br><small style="color:#aaa;font-weight:400;"><?= htmlspecialchars(substr($r['message'],0,60)) ?>...</small>
                </td>
                <td style="white-space:nowrap;"><?= date('M d, Y', strtotime($r['submitted_at'])) ?></td>
                <td>
                    <?php if (!$r['is_read']): ?>
                        <span style="color:#ff6fb5;font-weight:700;">🔴 Unread</span>
                    <?php else: ?>
                        <span style="color:#aaa;">✅ Read</span>
                    <?php endif; ?>
                </td>
                <td style="white-space:nowrap;">
                    <?php if (!$r['is_read']): ?>
                        <a href="messages.php?read=<?= $r['message_id'] ?>" class="btn-sm-blue">✅ Mark Read</a>
                        &nbsp;
                    <?php endif; ?>
                    <a href="messages.php?delete=<?= $r['message_id'] ?>"
                       class="btn-sm-red"
                       onclick="return confirm('Delete this message?');">🗑 Delete</a>
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
