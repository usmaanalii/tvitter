<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../includes/sql-helper.inc.php';
require_once __DIR__ . "/../includes/profile.inc.php";

$username = isset($_GET['username']) ? $_GET['username'] : $_SESSION['username'];
$current_profile = new UserProfile($username);
$posts = $current_profile->get_posts();

if (isset($_POST['tveet-text'])) {

    $sender_profile = new UserProfile($_SESSION['username']);
    $recipient_profile = new UserProfile($_GET['recipient']);

    if (isset($_POST['title-selection'])) {
        $title = $_POST['title-selection'];
        $post = $_POST['tveet-text'];

        $sender_profile->insert_post($sender_profile->id, $recipient_profile->id, $post, $title);
    }
    else {
        $post = $_POST['tveet-text'];

        $sender_profile->insert_post($sender_profile->id, $recipient_profile->id, $post);
    }

    header("Location: ../pages/profile.php?username=$recipient_profile->username");
}

if (isset($_POST['delete-post-id'])) {

    $current_profile->delete_post($_POST['delete-post-id']);

    $post_recipient = $_POST['post-recipient'];

    header("Location: ../pages/profile.php?username=$post_recipient");
}

/**
 * Leads to the edit-profile page, where further user details can be added
 */
if (isset($_POST['edit-profile'])) {

    header("Location: ../pages/edit-profile.php?username=" . $_GET['username']);
}

/**
 * Used to add a title to the post
 */

if (isset($_POST['title-name'])) {
    $search_results = UserProfile::search_title(trim($_POST['title-name']));
    require_once '../pages/components/title-page/title-search-results.php';
}

/**
 * assigns the static methods to variables
 *
 * $poster_url_method is used to insert the titles poster by providiing
 * a url for the href value
 *
 * $title_details_method is used to display the selected title's details on
 * the title-search page
 */
$poster_url_method = array('UserProfile', 'get_poster_url');
$title_details_method = array('UserProfile', 'get_title_details');
