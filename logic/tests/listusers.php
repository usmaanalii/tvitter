<?php
    require_once __DIR__ . '/../../includes/sql-helper.inc.php';

    session_start();

    $sql_helper = new SqlHelper();

    $usernames = $sql_helper->get_all_usernames();
?>

<h1 style="text-align: center;">Users</h1>
<br>
<?php foreach($usernames as $username): ?>
    <ul>
        <!-- passing the username in the url -->
        <a href="profile-page.php?username=<?php echo $username ?>"><?php echo $username; ?></a>
    </ul>
<?php endforeach; ?>
