<?php
require_once __DIR__ . '/../../includes/ajax/login.inc.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Determines whether or not the current input is already in the database
    $password_status = AjaxUserLogin::check_password_match($username, $password);

    echo $password_status;

}
