<?php
    require_once __DIR__ . '/../includes/login.inc.php';

    // check if form is complete
    $complete_form = !empty($_POST['username']) && !empty($_POST['password']);

    $logged_in_user = new UserLogin($_POST['username'], $_POST['password']);

    $password_match = $logged_in_user->check_password_match();

    if ($complete_form) {
        if ($password_match) {

            if(!isset($_SESSION)){
                session_start();
            };

            $session_id = $logged_in_user->login_session_variables()["id"];
            $session_username = $logged_in_user->login_session_variables()["username"];

            $_SESSION['id'] = $session_id;
            $_SESSION['username'] = $session_username;

            header('Location: ../pages/profile.php');
        }
        else {
            header("Location: ../pages/error/incorrect-password.php");
        }
    }
    else {
        header("Location: ../pages/error/incomplete-field.php");
    }


?>
