<?php
session_start();
include '../database.php';

$action = $_GET['action'] ?? 'add';
$id = $_GET['id'] ?? null;
$race_name = $race_date = $category = "";

if ($action === 'edit' && $id) {
    $result = $conn->query("SELECT * FROM upcoming_races WHERE id=$id");
    $data = $result->fetch_assoc();
    $race_name = $data['race_name'];
    $race_date = $data['race_date'];
    $category = $data['category'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $race_name = $_POST['race_name'];
    $race_date = $_POST['race_date'];
    $category = $_POST['category'];

    if ($action === 'edit') {
        $conn->query("UPDATE upcoming_races SET race_name='$race_name', race_date='$race_date', category='$category' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO upcoming_races (race_name, race_date, category) VALUES ('$race_name', '$race_date', '$category')");
    }
    header("Location: ../../Pages/edit.php");
    exit;
}
?>
<form method="post">
    <label>Race Name:</label><input type="text" name="race_name" value="<?= $race_name ?>"><br>
    <label>Date:</label><input type="date" name="race_date" value="<?= $race_date ?>"><br>
    <label>Category:</label><input type="text" name="category" value="<?= $category ?>"><br>
    <button type="submit"><?= ucfirst($action) ?></button>
</form>