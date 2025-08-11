<?php
session_start();
include '../database.php';

$action = $_GET['action'] ?? 'add';
$id = $_GET['id'] ?? null;
$category = $time = "";

if ($action === 'edit' && $id) {
    $result = $conn->query("SELECT * FROM race_stats WHERE id=$id");
    $data = $result->fetch_assoc();
    $category = $data['category'];
    $time = $data['time'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $time = $_POST['time'];

    if ($action === 'edit') {
        $conn->query("UPDATE race_stats SET category='$category', time='$time' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO race_stats (category, time) VALUES ('$category', '$time')");
    }
    header("Location: ../../Pages/edit.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= ucfirst($action) ?> Race Stat</title>
    <link rel="stylesheet" href="../../Pages/style3.css">
</head>
<body>
<h2><?= ucfirst($action) ?> Race Stat</h2>
<form method="post">
    <label>Category:</label>
    <input type="text" name="category" value="<?= htmlspecialchars($category) ?>" required><br>
    
    <label>Time:</label>
    <input id="timeInput" name="time" type="text" value="<?= htmlspecialchars($time) ?>" required>

    
    <button type="submit"><?= ucfirst($action) ?></button>
</form>

<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#timeInput", {
    enableTime: true,
    noCalendar: true,
    enableSeconds: true,
    time_24hr: true,
    dateFormat: "H:i:S",
  });
</script>
</body>
</html>