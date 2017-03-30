<?php
require_once __DIR__ . '/../includes/sql-helper.inc.php';
require_once __DIR__ . '/../includes/timeline.inc.php';

/**
 * If the user has searched for posts then those posts will be displayed
 * Check to see if the search isn't just white-space
 */
if (isset($_POST['search-input']) && !ctype_space($_POST['search-input'])) {
    $timeline = new Timeline();
    $posts = $timeline->get_matched_posts($_POST['search-input']);
} else {
    $timeline = new Timeline();
    $posts = $timeline->get_all_posts();
}


// Used to delete the current post
if (isset($_POST['delete-post-id'])) {

    $timeline->delete_post($_POST['delete-post-id']);

    header("Location: ../pages/timeline.php?username=" . $_GET['username']);
}

// No closing php tag according to php style guide
