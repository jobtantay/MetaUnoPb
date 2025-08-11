<?php
session_start();
include '../database.php';

$action = $_GET['action'] ?? 'add';
$id = $_GET['id'] ?? null;

$category = $target_time = "";

if ($action === 'edit' && $id) {
    $result = $conn->query("SELECT * FROM race_goal WHERE id=$id");
    $data = $result->fetch_assoc();
    $category = $data['category'];
    $target_time = $data['target_time'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $target_time = $_POST['target_time'];

    if ($action === 'edit') {
        $conn->query("UPDATE race_goal SET category='$category', target_time='$target_time' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO race_goal (category, target_time) VALUES ('$category', '$target_time')");
    }

    header("Location: ../../Pages/edit.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= ucfirst($action) ?> Race Goal</title>
    <link rel="stylesheet" href="../../Pages/style3.css">

    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
<h2><?= ucfirst($action) ?> Race Goal</h2>
<form method="post">
    <label>Category:</label>
    <input type="text" name="category" value="<?= htmlspecialchars($category) ?>" required><br>

    <label>Target Time:</label>
    <input id="timeInput" name="target_time" type="text" value="<?= htmlspecialchars($target_time) ?>" required><br>

    <button type="submit"><?= ucfirst($action) ?></button>
</form>

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