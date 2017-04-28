<?php
require_once __DIR__ . '/../../includes/ajax/registration.inc.php';

if (isset($_POST['username']) && !empty($_POST['username'])) {

    $username = $_POST['username'];

    $username_status = AjaxUserRegistration::check_username($username);

    echo $username_status;
}

if (isset($_POST['password']) && !empty($_POST['password'])) {

    $password = $_POST['password'];

    /**
     * [returns an integer associated with the strength of the password]
     * @var [int]
     */
    $password_strength = AjaxUserRegistration::check_password_strength($password);

    echo $password_strength;
}
