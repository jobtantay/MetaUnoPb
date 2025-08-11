<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Best Records</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Mozilla+Text&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">

    <!-- Navigation Bar -->
    <nav class="nav">
        <div class="nav-logo">
            <img src="/MetaUnoPb/Images/hub.png" alt="Hub Logo">
        </div>

        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="dashboard.php" class="Dashboard active">Milestone Tracker</a></li>
            </ul>
        </div>

       <div class="nav-button">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Show Logout if logged in -->
                <a href="../database/logout.php" class="btn white-btn" id="logoutBtn">LOGOUT</a>
            <?php else: ?>
                <!-- Show Login if not logged in -->
                <a href="landing.php?view=login" class="btn white-btn" id="loginBtn">LOGIN</a>
            <?php endif; ?>
        </div>

        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <!-- BOX THAT CONTAINS THE CONTENT -->
<div class="container">
  <!-- Race box -->
  <div class="race-box">
    <h3>Upcoming Race</h3>
    <table class="box-table">
      <tr>
        <th>Race Name</th>
        <th>Date</th>
        <th>Category</th>
      </tr>
      <?php include '../Database/upcomingRace.php'; ?>
    </table>
  </div>

  <!-- Stats and goal side by side -->
  <div class="right-side">
    <div class="stat-box">
      <h3>Stats</h3>
      <?php include '../Database/stats.php'; ?>
    </div>

    <div class="goal-box">
      <h3>Goal</h3>
      <?php include '../Database/raceGoal.php'; ?>
    </div>
  </div>
    </div>

    <!-- EDIT BUTTON OUTSIDE THE CONTAINER -->
    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="edit.php" class="edit-btn">Edit</a>
    <?php endif; ?>
  
</div>


</div>
</div>

</div>
</body>
</html>
