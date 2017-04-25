<?php
require_once __DIR__ . '/../includes/registration.inc.php';

$complete_form = !empty($_POST['username']) && !empty($_POST['password']);

$register_user = new UserRegistration($_POST['username'], $_POST['password']);

if ($complete_form) {
    if ($register_user->check_username_exists() == 0) {
        $register_user->insert_user();
        header("Location: ../index.php");
    } else {
        header("Location: ../pages/registration.php");
    }
}
else {
    header("Location: ../pages/registration.php");
}

// No closing php tag according to php style guide
