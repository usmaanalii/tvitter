<?php
require_once __DIR__ . '/../includes/sql-helper.inc.php';
require_once __DIR__ . "/../includes/profile.inc.php";

if(!isset($_SESSION)) {
    session_start();
}

 /**
  * reprsents the user of the current profile being shown
  * @var $current_profile
  */
$current_profile = new UserProfile($username);

if (isset($_POST['post-message'])) {
    $post = $_POST['post-message'];

    $sender_profile = new UserProfile($_SESSION['username']);
    $recipient_profile = new UserProfile($_GET['recipient']);

    $sender_profile->insert_post_data($sender_profile->id, $recipient_profile->id, $post);

    header("Location: ../pages/profile.php?username=$recipient_profile->username");
}

/**
 * Used to retrieve the posts for the current profile being shown
 * TODO: Need this to work through the UserProfile Class in profile.inc.php
 * @var SqlHelper
 */
$sql_helper = new SqlHelper();
$posts = $sql_helper->get_user_posts($current_profile->id);
// No closing php tag according to php style guide

// Delete post
if (isset($_POST['delete-post-id'])) {

    $sql_helper = new SqlHelper();

    $sql_helper->delete_post($_POST['delete-post-id']);

    header("Location: ../pages/profile.php");
}

// Edit Profile
if (isset($_POST['edit-profile'])) {

    header("Location: ../pages/edit-profile.php?username=" . $_GET['username']);
}
