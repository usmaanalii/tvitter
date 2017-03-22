<?php
    require_once __DIR__ . "/../includes/profile.inc.php";

    if(!isset($_SESSION)) {
        session_start();
    }

    // This will be used to display the data for current profile
    $profile_data = new UserProfile($username);

    // session_start();

    // Logged in user
    $sender_username = $_SESSION['username'];

    // This will be used to submit the posted message
    $sender_profile = new UserProfile($sender_username);

    if (isset($_POST['post-message'])) {
        $post = $_POST['post-message'];

        $recipient = $_GET['recipient'];

        $sender_profile->insert_post_data($post . " - to " . $recipient);
        header("Location: ../pages/profile.php?username=$recipient");
    }

?>
