<?php

    function check_password_match()
    {
        $sql_helper = new SqlHelper();
        // password given by the login form
        $form_password = $this->password;
        $db_password = $sql_helper->get_password($this->username);

        if ($form_password == $db_password) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
?>
