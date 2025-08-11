<?php
session_start();
?>
<nav>
    <ul>
        <li><a href="dashboard.php">Milestone Tracker</a></li>

        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
