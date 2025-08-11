<?php
session_start();
include '../database.php';

$table = $_GET['table'] ?? '';
$id = $_GET['id'] ?? '';

$allowed_tables = ['upcoming_races', 'race_stats', 'race_goal'];

if (in_array($table, $allowed_tables) && is_numeric($id)) {
    $conn->query("DELETE FROM $table WHERE id = $id");
}

header("Location: ../../Pages/edit.php");
exit;