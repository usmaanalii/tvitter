<?php
    require_once __DIR__ . '/../includes/login.inc.php';

    // check if username and password have been added
    $complete_form = !empty($_POST['username']) && !empty($_POST['password']);

    $login_user = new UserLogin($_POST['username'], $_POST['password']);

    $password_match = $login_user->check_password_match();

    if ($complete_form) {
        if ($password_match) {
            session_start();
            $_SESSION['id'] = $login_user->login_session_variables()["id"];
            $_SESSION['username'] = $login_user->login_session_variables()["username"];
            header('Location: ../pages/profile-page.php');
        }
        else {
            header("Location: ../pages/error/incorrect-password.php");
        }
    }
    else {
        header("Location: ../pages/error/incomplete-field.php");
    }


?>
