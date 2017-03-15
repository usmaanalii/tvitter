<?php
    require_once __DIR__ . '/registration.inc.php';
    require_once __DIR__ . '/sql-helper.inc.php';

    /**
     * RegisterUser class
     *
     * @param string username
     * @param string password
     *
     * @method bool check_password_match (compare form password with database password)
     *
     */
    class UserLogin extends RegisterUser
    {
        private $username;
        private $password;

        function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }

        /**
        * @method check_password_match
        *
        * goals of the function include...
        *   1. Recieve login form username and password
        *   2. Use the posted username to retrieve its associated password in the database
        *   3. Compare the form password with the database password
        *
        *
        * @return bool (indicate whether both passwords match)
        */
        public function check_password_match()
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

        // TODO: Add Docblock
        public function login_session_variables()
        {
            $sql_helper = new SqlHelper();
            $values = $sql_helper->get_user_data($this->username);

            return $values;
        }
    }

?>
