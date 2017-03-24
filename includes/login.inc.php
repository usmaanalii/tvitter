<?php
    require_once __DIR__ . '/registration.inc.php';
    require_once __DIR__ . '/sql-helper.inc.php';

    /**
     * RegisterUser class
     *
     * @param string username
     * @param string password
     *
     * TODO: Add all new methods
     *
     * @method bool check_password_match (compare form password with database password)
     * @method array login_session_variables (used to retrieve profile data for logged in user)
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
            $db_password = $sql_helper->get_user_data($this->username)["password"];

            if ($form_password == $db_password) {
                return TRUE;
            } else {
                return FALSE;
            }

        }

        /**
        * @method login_session_variables
        *
        * goals of the function include...
        *   1. Act as a wrapper to get the user data
        *   2. Retrieve the id and username for the specified user
        *   3. Will be used in logic/login.php to set the $_SESSION['id'] and $_SESSION['username'] variables
        *
        *
        * @return array (e.g login_session_variables["id"] = 1, login_session_variables["username"] = 'tom')
        */
        public function login_session_variables()
        {
            $sql_helper = new SqlHelper();
            $values = $sql_helper->get_user_data($this->username);

            return $values;
        }
    }

?>
