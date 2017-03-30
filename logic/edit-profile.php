<?php
require_once __DIR__ . '/../includes/edit-profile.inc.php';

if(!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['bio-message-submit'])) {

    $edit_profile = new EditProfile($_SESSION['username']);

    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    $user_id = $_SESSION['id'];

    $edit_profile->update_profile($bio, $email, $website);

    header("Location: ../pages/profile.php?username=" .  $_SESSION['username']);
}
