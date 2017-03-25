<ul id="header">
    <?php session_start(); ?>
    <li><a href="/code/tvitter/pages/profile.php">Profile</a></li>
    <li><a href="/code/tvitter/pages/listusers.php?username=<?php echo $_SESSION['username'] ?>">Users</a></li>
    <li><a href="/code/tvitter/pages/timeline.php?username=<?php echo $_SESSION['username'] ?>">Timeline</a></li>
    <li><a href="/code/tvitter/pages/login.php">Logout</a></li>
</ul>
