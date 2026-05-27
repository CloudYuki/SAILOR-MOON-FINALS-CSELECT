<?php
include('../includes/session.php');
include('../includes/conn.php');

$error   = '';
$success = '';

// ── ADD NEW ADMIN ────────────────────────────────────────────
if (isset($_POST['add_admin'])) {
    $uname   = mysqli_real_escape_string($conn, trim($_POST['username']));
    $email   = mysqli_real_escape_string($conn, trim($_POST['email']));
    $pass    = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);

    if (empty($uname) || empty($email) || empty($pass) || empty($confirm)) {
        $error = "⚠️ Please fill in all fields.";
    } elseif ($pass !== $confirm) {
        $error = "⚠️ Passwords do not match!";
    } elseif (strlen($pass) < 6) {
        $error = "⚠️ Password must be at least 6 characters.";
    } else {
        $check = mysqli_query($conn, "SELECT admin_id FROM $tablelogin WHERE username='$uname' OR email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = "⚠️ Username or email already exists.";
        } else {
            $hashed = hash('sha256', $pass);
            $sql = "INSERT INTO $tablelogin (username, email, password_hash) VALUES ('$uname', '$email', '$hashed')";
            if (mysqli_query($conn, $sql)) {
                $success = "✅ Admin account '{$uname}' created successfully! 🌙";
            } else {
                $error = "❌ Failed: " . mysqli_error($conn);
            }
        }
    }
}

// ── DELETE ADMIN ─────────────────────────────────────────────
if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    if ($del_id === (int)$_SESSION['admin_id']) {
        $error = "⚠️ You cannot delete your own account!";
    } else {
        $q = mysqli_query($conn, "SELECT username FROM $tablelogin WHERE admin_id=$del_id");
        $r = mysqli_fetch_assoc($q);
        if ($r) {
            mysqli_query($conn, "DELETE FROM $tablelogin WHERE admin_id=$del_id");
            $success = "✅ Admin '{$r['username']}' has been removed.";
        }
    }
}

// ── CHANGE PASSWORD ──────────────────────────────────────────
if (isset($_POST['change_password'])) {
    $target_id   = (int)$_POST['target_admin_id'];
    $new_pass    = trim($_POST['new_password']);
    $confirm_new = trim($_POST['confirm_new_password']);

    if (empty($new_pass) || empty($confirm_new)) {
        $error = "⚠️ Please fill in both password fields.";
    } elseif ($new_pass !== $confirm_new) {
        $error = "⚠️ Passwords do not match!";
    } elseif (strlen($new_pass) < 6) {
        $error = "⚠️ Password must be at least 6 characters.";
    } else {
        $hashed = hash('sha256', $new_pass);
        mysqli_query($conn, "UPDATE $tablelogin SET password_hash='$hashed' WHERE admin_id=$target_id");
        $success = "✅ Password updated successfully!";
    }
}
?>
<?php include('../includes/header.php'); ?>

<div class="page-wrap">

    <?php if ($success): ?>
        <div class="sm-alert sm-alert-success"><?= $success ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="sm-alert sm-alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; flex-wrap:wrap;">

        <!-- ADD NEW ADMIN FORM -->
        <div class="section-card">
            <h2 class="section-title">➕ Add New Admin</h2>
            <form method="POST" action="">
                <div style="display:flex; flex-direction:column; gap:1rem;">
                    <div>
                        <label class="sm-label">✨ Username</label>
                        <input type="text" class="sm-input" name="username" placeholder="e.g. sailor_admin" required>
                    </div>
                    <div>
                        <label class="sm-label">💌 Email</label>
                        <input type="email" class="sm-input" name="email" placeholder="admin@sailormoon.com" required>
                    </div>
                    <div>
                        <label class="sm-label">🔒 Password</label>
                        <input type="password" class="sm-input" name="password" placeholder="Min. 6 characters" required>
                    </div>
                    <div>
                        <label class="sm-label">🔒 Confirm Password</label>
                        <input type="password" class="sm-input" name="confirm_password" placeholder="Repeat password" required>
                    </div>
                    <button type="submit" name="add_admin" class="btn-submit">✨ Create Admin Account</button>
                </div>
            </form>
        </div>

        <!-- CHANGE PASSWORD FORM -->
        <div class="section-card">
            <h2 class="section-title">🔑 Change Admin Password</h2>
            <form method="POST" action="">
                <div style="display:flex; flex-direction:column; gap:1rem;">
                    <div>
                        <label class="sm-label">👤 Select Admin</label>
                        <select class="sm-input" name="target_admin_id" required style="border-radius:50px;">
                            <?php
                            $admins = mysqli_query($conn, "SELECT admin_id, username FROM $tablelogin ORDER BY admin_id ASC");
                            while ($a = mysqli_fetch_assoc($admins)):
                            ?>
                            <option value="<?= $a['admin_id'] ?>"
                                <?= $a['admin_id'] == $_SESSION['admin_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($a['username']) ?>
                                <?= $a['admin_id'] == $_SESSION['admin_id'] ? '(you)' : '' ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div>
                        <label class="sm-label">🔒 New Password</label>
                        <input type="password" class="sm-input" name="new_password" placeholder="Min. 6 characters" required>
                    </div>
                    <div>
                        <label class="sm-label">🔒 Confirm New Password</label>
                        <input type="password" class="sm-input" name="confirm_new_password" placeholder="Repeat new password" required>
                    </div>
                    <button type="submit" name="change_password" class="btn-submit" style="background:linear-gradient(135deg,#6a8cff,#a06fff);">
                        🔑 Update Password
                    </button>
                </div>
            </form>
        </div>

    </div>

    <!-- ALL ADMINS TABLE -->
    <div class="section-card" style="margin-top:0;">
        <h2 class="section-title">👥 All Admin Accounts</h2>
        <table class="sm-table">
            <thead>
                <tr><th>#</th><th>Username</th><th>Email</th><th>Created</th><th>Last Login</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM $tablelogin ORDER BY admin_id ASC");
            while ($row = mysqli_fetch_assoc($q)):
                $isYou = ($row['admin_id'] == $_SESSION['admin_id']);
            ?>
            <tr style="<?= $isYou ? 'background:#fff8fc;' : '' ?>">
                <td><?= $row['admin_id'] ?></td>
                <td>
                    <strong><?= htmlspecialchars($row['username']) ?></strong>
                    <?php if ($isYou): ?>
                        <span style="background:#ff6fb5;color:#fff;font-size:.72rem;padding:.15rem .5rem;border-radius:50px;margin-left:.4rem;">YOU</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= date('M d, Y', strtotime($row['created_at'])) ?></td>
                <td><?= $row['last_login'] ? date('M d, Y H:i', strtotime($row['last_login'])) : '<span style="color:#ccc;">Never</span>' ?></td>
                <td>
                    <?php if (!$isYou): ?>
                        <a href="admin_management.php?delete=<?= $row['admin_id'] ?>"
                           class="btn-sm-red"
                           onclick="return confirm('Remove admin <?= htmlspecialchars($row['username']) ?>? This cannot be undone!');">
                            🗑 Remove
                        </a>
                    <?php else: ?>
                        <span style="color:#ccc;font-size:.9rem;">— current session —</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <p style="color:#aaa;font-size:.85rem;margin-top:1rem;">
            💡 You cannot delete your own account while logged in.
        </p>
    </div>

</div>

<footer>© 2026 Sailor Moon Fan Website — Admin Panel 🌙</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
