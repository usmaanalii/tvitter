<?php
    require_once __DIR__ . "/sql-helper.inc.php";

    $sql_helper = new SqlHelper();

    $bio = $sql_helper->get_user_bio($username);
?>
