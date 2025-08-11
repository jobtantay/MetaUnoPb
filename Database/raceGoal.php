<?php
include 'database.php';

// Query all race goals
$sql = "SELECT category, target_time FROM race_goal ORDER BY target_time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="box-table">';
    echo '<tr><th>Category</th><th>Target Time</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['category']) . '</td>';
        echo '<td>' . htmlspecialchars($row['target_time']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No race goals set</p>';
}

$conn->close();
?>