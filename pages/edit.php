<?php
session_start();
include '../Database/database.php'; // Your DB connection

if (!isset($_SESSION['user_id'])) {
    header("Location: landing.php?view=login");
    exit;
}

// Fetch existing data
$upcoming = $conn->query("SELECT * FROM upcoming_races");
$stats = $conn->query("SELECT * FROM race_stats");
$goals = $conn->query("SELECT * FROM race_goal");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Records</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<h1>Edit Races, Stats, and Goals</h1>

<!-- Upcoming Races -->
<h2>Upcoming Races</h2>
<a href="../Database/crud/form_upcoming.php?action=add" class="add-btn">Add New Race</a>
<table border="1">
<tr>
    <th>Race Name</th><th>Date</th><th>Category</th><th>Actions</th>
</tr>
<?php while($row = $upcoming->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['race_name']) ?></td>
    <td><?= htmlspecialchars($row['race_date']) ?></td>
    <td><?= htmlspecialchars($row['category']) ?></td>
    <td>
<a href="../Database/crud/form_upcoming.php?action=edit&id=<?= $row['id'] ?>" class="action-btn edit">Edit</a>
<a href="../Database/crud/delete.php?table=upcoming_races&id=<?= $row['id'] ?>" class="action-btn delete" onclick="return confirm('Delete this race?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<!-- Race Stats -->
<h2>Race Stats</h2>
<a href="../Database/CRUD/form_stats.php?action=add" class="add-btn">Add Stat</a>
<table border="1">
<tr>
    <th>Category</th><th>Time</th><th>Actions</th>
</tr>
<?php while($row = $stats->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['category']) ?></td>
    <td><?= htmlspecialchars($row['time']) ?></td>
    <td>
<a href="../Database/CRUD/form_stats.php?action=edit&id=<?= $row['id'] ?>" class="action-btn edit">Edit</a>
<a href="../Database/CRUD/delete.php?table=race_stats&id=<?= $row['id'] ?>" class="action-btn delete" onclick="return confirm('Delete this stat?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<!-- Race Goals -->
<h2>Race Goals</h2>
<a href="../Database/CRUD/form_goal.php?action=add" class="add-btn">Add Goal</a>
<table border="1">
<tr>
    <th>Category</th><th>Target Time</th><th>Actions</th>
</tr>
<?php while($row = $goals->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['category']) ?></td>
    <td><?= htmlspecialchars($row['target_time']) ?></td>
    <td>
        <a href="../Database/CRUD/form_goal.php?action=edit&id=<?= $row['id'] ?>" class="action-btn edit">Edit</a>
        <a href="../Database/CRUD/delete.php?table=race_goal&id=<?= $row['id'] ?>" class="action-btn delete" onclick="return confirm('Delete this goal?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>