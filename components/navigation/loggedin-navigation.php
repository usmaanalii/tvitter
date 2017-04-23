<ul id="header">
    <?php
            if (!isset($_SESSION)) {
                session_start();
            }
        ?>
    <li><a href="/code/tvitter/pages/profile.php?username=<?php echo $_SESSION['username'] ?>">Profile</a></li>
    <li><a href="/code/tvitter/pages/list-users.php?username=<?php echo $_SESSION['username'] ?>">Users</a></li>
    <li><a href="/code/tvitter/pages/timeline.php?username=<?php echo $_SESSION['username'] ?>">Timeline</a></li>
    <li><a href="/code/tvitter/logic/logout.php">Logout</a></li>
</ul>
