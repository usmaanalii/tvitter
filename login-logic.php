<?php
    // PASSWORD MATCH NOT WORKING

    require_once 'includes/login.inc.php';

    $login_user = new UserLogin($_POST['username'], $_POST['password']);

    $password_match = $login_user->check_password_match();

    if ($password_match) {
        header("Location: pages/profile-page.php");
    }
    else {
        header("Location: pages/error/incorrect-password.php");
    }

?>
