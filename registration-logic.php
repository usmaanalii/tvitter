<?php
    require_once 'includes/registration.inc.php';

    $user = new RegisterUser($_POST['username'], $_POST['password']);
    
    if ($user->check_user_data()) {
        $user->insert_user_data();
        header("Location: pages/login-page.php");
    } else {
        header("Location: pages/error/username-taken.php");
    }

?>
