<nav class="navbar navbar-fixed-top">
    <ul id="navigation">

        <li>
            <a href="profile.php?username=<?php echo $_SESSION['username'] ?>">Profile</a>
        </li>

        <li>
            <a href="list-users.php?username=<?php echo $_SESSION['username'] ?>">Users</a>
        </li>

        <li>
            <a href="timeline.php?username=<?php echo $_SESSION['username'] ?>">Timeline</a>
        </li>

        <li>
            <a href="title-page.php?username=<?php echo $_SESSION['username'] ?>">Search</a>
        </li>

        <li>
            <a href="../logic/logout.php">Logout</a>
        </li>

    </ul>
</nav>
