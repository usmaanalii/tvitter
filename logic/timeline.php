<?php
    require_once __DIR__ . '/../includes/sql-helper.inc.php';

    // TODO: Need this to work through the UserProfile Class in profile.inc.php
    $sql_helper = new SqlHelper();
    $posts = $sql_helper->get_all_posts();
?>
