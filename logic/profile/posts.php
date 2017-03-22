<?php

    require_once __DIR__ . "/../../includes/profile.inc.php";

    $profile = new UserProfile($username);

    if (isset($_POST['post-message'])) {
        $post = $_POST['post-message'];
        $profile->insert_post_data($post);
        header("Location: ../pages/profile.php");
    }
?>
