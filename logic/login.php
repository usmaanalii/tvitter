<?php
require_once __DIR__ . '/../includes/login.inc.php';

$complete_form = !empty($_POST['username']) && !empty($_POST['password']);

$logged_in_user = new UserLogin($_POST['username'], $_POST['password']);

$password_match = $logged_in_user->check_password_match();

if ($complete_form) {
    if ($password_match) {

        $logged_in_user_data = $logged_in_user->get_user_data();

        session_start();

        $session_id = $_SESSION['id'] = $logged_in_user_data['id'];
        $session_username = $_SESSION['username'] = $logged_in_user_data['username'];

        header("Location: ../pages/profile.php?username=$session_username");
    }
    else {
        header("Location: ../index.php");
    }
}
else {
    header("Location: ../index.php");
}
