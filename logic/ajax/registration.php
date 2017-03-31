<?php
require_once __DIR__ . '/../../includes/ajax/registration.inc.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $register_user = new AjaxRegisterUser($username);

    echo $register_user->check_username();
}

if (isset($_POST['password'])) {

    // TODO: Need this to work through AjaxRegisterUser Class
    function password_strength_check($password)
    {
        /**
         * Criteria for strength
         *
         * 1. Longer than 6 chars
         * 2. Uppercase character
         * 3. Numbers
         * 4. Special character
         */
        $length = strlen($password) > 6 ? TRUE:FALSE;
        $uppercase = preg_match('/[A-Z]/', $password) ? TRUE:FALSE;
        $numbers = preg_match('/[0-9]/', $password) ? TRUE:FALSE;

        return $length + $uppercase + $numbers;
    }

    echo password_strength_check($_POST['password']);

}
