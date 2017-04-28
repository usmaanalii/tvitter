<?php
require_once __DIR__ . '/../includes/edit-profile.inc.php';

if (isset($_POST['add-info-submit'])) {

    $edit_profile = new EditProfile($_SESSION['username']);

    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    $edit_profile->update_profile($bio, $email, $website);

    header("Location: ../pages/profile.php?username=" .  $_SESSION['username']);
}
