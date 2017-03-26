<?php
require_once __DIR__ . '/../includes/registration.inc.php';

$complete_form = !empty($_POST['username']) && !empty($_POST['password']);

$register_user = new RegisterUser($_POST['username'], $_POST['password']);

if ($complete_form) {
    if ($register_user->check_user_data()) {
        $register_user->insert_user_data();
        header("Location: ../pages/login.php");
    } else {
        header("Location: ../pages/error/username-taken.php");
    }
}
else {
    header("Location: ../pages/error/incomplete-field.php");
}

// No closing php tag according to php style guide
