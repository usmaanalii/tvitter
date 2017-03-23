<?php
    require_once __DIR__ . '/../includes/sql-helper.inc.php';
    require_once __DIR__ . "/../includes/profile.inc.php";

    if(!isset($_SESSION)) {
        session_start();
    }

     /**
      * This object represents the current page's user (being viewed), from which
      * the username and bio will be dynamically displayed
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

    // TODO: Need this to work through the UserProfile Class in profile.inc.php
    $sql_helper = new SqlHelper();
    $posts = $sql_helper->get_user_posts($current_profile->id);

    // Change username in the event, post is on own profile
    foreach ($posts as $post) {
        if ($post['recipient_username'] == $current_profile->username) {
            $post['recipient_username'] = ".";
        }
    }


?>
