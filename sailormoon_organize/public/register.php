<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Access Denied</title>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Fredoka',sans-serif; background:linear-gradient(135deg,#ffc3e1,#ffd6f0,#e6d5ff); min-height:100vh; display:flex; align-items:center; justify-content:center; }
        .card { background:#fff; border-radius:30px; border:4px solid #ff6fb5; padding:3rem; text-align:center; max-width:420px; box-shadow:0 20px 50px rgba(255,111,181,.3); }
        h1 { font-family:'Bubblegum Sans',cursive; color:#ff6fb5; font-size:2rem; margin-bottom:1rem; }
        p  { color:#888; margin-bottom:1.5rem; line-height:1.7; }
        a  { display:inline-block; padding:.8rem 2rem; background:linear-gradient(135deg,#ff6fb5,#ffd56a); color:#fff; border-radius:50px; text-decoration:none; font-weight:700; transition:all .2s; }
        a:hover { transform:translateY(-3px); }
    </style>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['admin_username'])) {
    header('Location: ../admin/admin_management.php');
    exit;
}
?>
<div class="card">
    <div style="font-size:5rem;">🚫🌙</div>
    <h1>Access Denied</h1>
    <p>Admin registration is not publicly available.<br>
       Please contact an existing administrator to create a new admin account.</p>
    <a href="login.php">← Back to Login</a>
</div>
</body>
</html>
