<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../includes/timeline.inc.php';

/**
 * If the user has searched for posts then posts
 * matching the search query will be displayed
 *
 * Initially it will check to see if the search isn't just white-space
 * performed by the ctype_space() function
 */
if (isset($_POST['search-input']) && !ctype_space($_POST['search-input'])) {
    $timeline = new Timeline();
    $posts = $timeline->get_matched_posts($_POST['search-input']);
} else {
    $timeline = new Timeline();
    $posts = $timeline->get_all_posts();
}

if (isset($_POST['delete-post-id'])) {

    $timeline->delete_post($_POST['delete-post-id']);

    header("Location: ../pages/timeline.php?username=" . $_GET['username']);
}

/**
 * $poster_url_method is used to insert the titles poster by providiing
 * a url for the href value
 */
$poster_url_method = array('Timeline', 'get_poster_url');
