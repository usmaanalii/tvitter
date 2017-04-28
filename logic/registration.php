<?php
require_once __DIR__ . '/../includes/registration.inc.php';

/**
 * [Used to check whether both username and password have inputs]
 * @var [bool]
 */
$complete_form = !empty($_POST['username']) && !empty($_POST['password']);

/**
 * [represents the object of the successfully registered user]
 * @var [UserRegistration]
 */
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
