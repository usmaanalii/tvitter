<?php
    require_once __DIR__ . '/../includes/sql-helper.inc.php';
    require_once __DIR__ . "/../includes/profile.inc.php";

    if(!isset($_SESSION)) {
        session_start();
    }

     /**
      * This object represents the current page's user, from which
      * the username and bio will be dynamically displayed
      * @var $profile_data
      */
    $profile_data = new UserProfile($username);

    $sender_profile = new UserProfile($_SESSION['username']);

    if (isset($_POST['post-message'])) {
        $post = $_POST['post-message'];

        $recipient = $_GET['recipient'];

        $sender_profile->insert_post_data($recipient . ' ' . $post);
        header("Location: ../pages/profile.php?username=$recipient");
    }

    // TODO: Need this to work through the UserProfile Class in profile.inc.php
    $sql_helper = new SqlHelper();

    $posts = $sql_helper->get_user_posts($profile_data->id);
?>
