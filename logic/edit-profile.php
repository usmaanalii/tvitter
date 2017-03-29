<?php
require_once __DIR__ . '/../includes/sql-helper.inc.php';

if(!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['bio-message-submit'])) {

    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    $user_id = $_SESSION['id'];

    $sql_helper = new SqlHelper();
    $sql_helper->insert_edit_bio($user_id, $bio, $email, $website);

    header("Location: ../pages/profile.php?username=" .  $_SESSION['username']);
}
