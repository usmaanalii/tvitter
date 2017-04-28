<?php
require_once __DIR__ . '/../../includes/ajax/login.inc.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $username_status = AjaxUserLogin::check_username($username);

    echo $username_status;

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password_status = AjaxUserLogin::check_password_match($username, $password);

        echo $password_status;
    }
}
