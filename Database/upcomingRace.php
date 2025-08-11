<?php
include 'database.php';
$sql = "SELECT race_name, race_date, category FROM upcoming_races 
        WHERE race_date >= CURDATE() 
        ORDER BY race_date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['race_name']) . "</td>";
        echo "<td>" . date("M j, Y", strtotime($row['race_date'])) . "</td>";
        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No upcoming races</td></tr>";
}
$conn->close();
?>