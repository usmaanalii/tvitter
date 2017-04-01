<?php
require_once __DIR__ . '/../../includes/ajax/registration.inc.php';

if (isset($_POST['username']) && !empty($_POST['username'])) {

    $username = $_POST['username'];

    // Determines whether or not the current input is already in the database
    $username_status = AjaxUserRegistration::check_username($username);

    echo $username_status;

}

if (isset($_POST['password']) && !empty($_POST['password'])) {

    $password = $_POST['password'];

    // Returns an integere (0, 1, 2, 3)
    $password_strength = AjaxUserRegistration::check_password_strength($password);

    echo $password_strength;
}
