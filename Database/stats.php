<?php
include 'database.php';

$sql = "SELECT category, time FROM race_stats ORDER BY time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="box-table">';
    echo '<tr><th>Category</th><th>Time</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['category']) . '</td>';
        echo '<td>' . htmlspecialchars($row['time']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No stats found</p>';
}

$conn->close();
?>