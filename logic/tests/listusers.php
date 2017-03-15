<?php
    require_once __DIR__ . '/../includes/sql-helper.inc.php';

    $sql_helper = new SqlHelper();

    $usernames = $sql_helper->get_all_usernames();

    for ($i = 0; $i < count($usernames); $i++) {
        echo $usernames[$i] . "<br><br>";
    }

?>
