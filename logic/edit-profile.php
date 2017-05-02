<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../includes/profile.inc.php';
require_once __DIR__ . '/../includes/edit-profile.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $edit_profile = new EditProfile($_SESSION['username']);

    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    $valid_email = !filter_var($email, FILTER_VALIDATE_EMAIL) === false;

    if ($valid_email) {
        $edit_profile->update_profile($bio, $email, $website);
        header("Location: ../pages/profile.php?username=" . $_SESSION['username']);
    }
    else {
        header("Location: ../pages/edit-profile.php?username=" . $_SESSION['username']);
    }
}
