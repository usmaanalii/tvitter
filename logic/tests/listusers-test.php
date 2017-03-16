<?php
    require_once __DIR__ . '/../../includes/sql-helper.inc.php';

    $sql_helper = new SqlHelper();

    $usernames = $sql_helper->get_all_usernames();
?>

<h1 style="text-align: center;">Users</h1>
<br>
<ul>
<?php foreach($usernames as $username): ?>

        <!-- passing the username in the url -->
        <a style="display: block;" href="profile-page.php?username=<?php echo $username ?>"><?php echo $username; ?></a>
        <br>

<?php endforeach; ?>
</ul>

<?php
    $dummy_bio = $sql_helper->get_user_bio("Dummy");

    $empty_bio = $sql_helper->get_user_bio("jav");

    $real_bio = $sql_helper->get_user_bio("Usy");

    echo $dummy_bio;
    echo "<br>";
    echo $empty_bio;
    echo "<br>";
    echo $real_bio;
?>
