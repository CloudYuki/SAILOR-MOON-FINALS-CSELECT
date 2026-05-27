<?php
include('../includes/session.php');
include('../includes/conn.php');

$id  = (int)$_GET['id'];
$q   = mysqli_query($conn, "SELECT name FROM $tablechar WHERE character_id=$id");
$row = mysqli_fetch_assoc($q);
$name = $row ? $row['name'] : 'Character';

// CASCADE delete will handle character_abilities automatically
if (mysqli_query($conn, "DELETE FROM $tablechar WHERE character_id=$id")) {
    $_SESSION['status'] = "✅ '{$name}' has been deleted. 🌙";
} else {
    $_SESSION['status'] = "❌ Delete failed: " . mysqli_error($conn);
}

header('Location: index.php');
exit;
?>
