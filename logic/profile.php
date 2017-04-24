<?php
require_once __DIR__ . '/../includes/sql-helper.inc.php';
require_once __DIR__ . "/../includes/profile.inc.php";

if(!isset($_SESSION)) {
    session_start();
}

 /**
  * reprsents the user of the current profile being shown
  * this will be either $_SESSION['username'] or $_GET['username']
  * @var $current_profile
  */
if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

$current_profile = new UserProfile($username);

/**
 * Used to insert the post into the `posts` table
 */
if (isset($_POST['post-message'])) {

    $sender_profile = new UserProfile($_SESSION['username']);
    $recipient_profile = new UserProfile($_GET['recipient']);

    if (isset($_POST['movie-selection-post'])) {
        $title = $_POST['movie-selection-post'];
        $post = $_POST['post-message'];

        $sender_profile->insert_post($sender_profile->id, $recipient_profile->id, $post, $title);
    }
    else {
        $post = $_POST['post-message'];

        $sender_profile->insert_post($sender_profile->id, $recipient_profile->id, $post);
    }



    header("Location: ../pages/profile.php?username=$recipient_profile->username");
}

/**
 * Used to retrieve the posts for the current profile being shown
 */
$posts = $current_profile->get_posts();

// Delete post
if (isset($_POST['delete-post-id'])) {

    $current_profile->delete_post($_POST['delete-post-id']);

    $post_recipient = $_POST['post-recipient'];

    header("Location: ../pages/profile.php?username=$post_recipient");
}

/**
 * Leads to the edit-profile page, where contact details can be added
 */
if (isset($_POST['edit-profile'])) {

    header("Location: ../pages/edit-profile.php?username=" . $_GET['username']);
}

// No closing php tag according to php style guide

if (isset($_POST['movie-name'])) {
    $search_results = UserProfile::search_title($_POST['movie-name']);

    require_once __DIR__ . '/../components/profile/title-search-results.php';
}
