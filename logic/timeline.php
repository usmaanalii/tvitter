<?php
require_once __DIR__ . '/../includes/sql-helper.inc.php';

// TODO: Need this to work through the UserProfile Class in profile.inc.php
$sql_helper = new SqlHelper();
$posts = $sql_helper->get_all_posts();

// Used to delete the current post
if (isset($_POST['delete-post-id'])) {

    $sql_helper = new SqlHelper();

    $sql_helper->delete_post($_POST['delete-post-id']);

    header("Location: ../pages/timeline.php?username=" .  $_GET['username']);
}

// No closing php tag according to php style guide
