<?php
require_once __DIR__ . '/../includes/login.inc.php';

// check if form is complete
$complete_form = !empty($_POST['username']) && !empty($_POST['password']);

$logged_in_user = new UserLogin($_POST['username'], $_POST['password']);

$password_match = $logged_in_user->check_password_match();

if ($complete_form) {
    if ($password_match) {

        if(!isset($_SESSION)){
            session_start();
        };

        $logged_in_user_data = $logged_in_user->get_user_data();

        $_SESSION['id'] = $logged_in_user_data['id'];
        $session_username = $_SESSION['username'] = $logged_in_user_data['username'];

        header("Location: ../pages/profile.php?username=$session_username");
    }
    else {
        header("Location: ../pages/error/incorrect-password.php");
    }
}
else {
    header("Location: ../pages/error/incomplete-field.php");
}

// No closing php tag according to php style guide
