<?php
require_once __DIR__ . '/../includes/sql-helper.inc.php';
require_once __DIR__ . '/../includes/timeline.inc.php';

// TODO: Need this to work through the UserProfile Class in profile.inc.php
$timeline = new Timeline();
$posts = $timeline->get_all_posts();

// Used to delete the current post
if (isset($_POST['delete-post-id'])) {

    $timeline->delete_post($_POST['delete-post-id']);

    header("Location: ../pages/timeline.php?username=" . $_GET['username']);
}

// No closing php tag according to php style guide
