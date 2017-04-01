<?php
require_once __DIR__ . '/../sql-helper.inc.php';
/**
 * Class for ajax registration methods
 */
class AjaxRegisterUser
{

    private $db_connection;

    function __construct()
    {
        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();
    }

    /**
    * @method check_username
    *
    * goals of the function include...
    *   1. Retrieve the user data for a specified username
    *   2. Assess whether ot not a username has already been taken
    *   3. Will mainly be used in the RegisterUser Class
    *
    * @param string username
    *
    * @return string (If the integer returned is bigget than zero, then the username exists, returning Y, else returns X)
    */
    public static function check_username($username)
    {
        global $db_connection;

        if (!($statement = $db_connection->prepare("SELECT * FROM `users` WHERE username = ?"))) {
            echo "Prepare failed: (" . $db_connection->errno . ") " . $db_connection->error;
        }
        if (!$statement->bind_param("s", $username)) {
            echo "Binding parameters failed: (" . $statement->errno . ") " . $statement->error;
        }

        if (!$statement->execute()) {
            echo "Execute failed: (" . $statement->errno . ") " . $statement->error;
        }

        $statement->store_result();

        $num_rows = $statement->num_rows;

        if ($num_rows > 0) {
            return "X";
        }
        else {
            return "Y";
        }

        return $num_rows;
    }

    /**
     * TODO: Docblock
     * [password_strength_check description]
     * @param  [type]  $password [description]
     * @return {[type]           [description]
     */
    public static function check_password_strength($password)
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
}
