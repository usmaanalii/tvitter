<?php
require_once __DIR__ . '/../sql-helper.inc.php';
/**
 * Class for ajax registration methods
 */
class AjaxRegisterUser
{

    private $username;
    private $db_connection;

    function __construct($username)
    {
        $this->username = $username;

        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();
    }

    public function check_username()
    {
        global $db_connection;

        if (!($statement = $db_connection->prepare("SELECT * FROM `users` WHERE username = ?"))) {
            echo "Prepare failed: (" . $db_connection->errno . ") " . $db_connection->error;
        }
        if (!$statement->bind_param("s", $this->username)) {
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
    public function password_strength_check($password)
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
