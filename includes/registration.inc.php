<?php
    require_once __DIR__ . '/sql-helper.inc.php';

    /**
     * RegisterUser class
     *
     * @param string username
     * @param string password
     *
     * @method bool check_user_data (check username from POST form)
     * @method void insert_user_data (insert username and password into  database)
     *
     */
    class RegisterUser
    {
        private $username;
        private $password;

        function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }

        /**
        * @method check_user
        *
        * goals of the function include...
        *   1. Check post data has been added via the registration form
        *   2. Check the posted username is not taken in the database
        *
        *
        * @return bool (indicates username unique or already taken)
        */

        public function check_user_data()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = mysql_real_escape_string($this->username);
            $password = mysql_real_escape_string($this->password);

            $sql_helper = new SqlHelper();

            if ($sql_helper->user_count($username) > 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

        /**
        * @method insert_user
        *
        * goals of the function include...
        *   1. Insert the username and password into the database
        *
        * @param string $registered_username (Post data from username field)
        * @param string $registered_password (Post data from password field)
        *
        * @return void
        */
        public function insert_user_data()
        {
            $sql_helper = new SqlHelper();

            $sql_helper->add_user($this->username, $this->password);
        }
    }

?>
