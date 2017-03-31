<?php
require_once __DIR__ . '/../../includes/ajax/registration.inc.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $register_user = new AjaxRegisterUser($username);

    echo $register_user->check_username();
}
