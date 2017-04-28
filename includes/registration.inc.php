<?php
require_once __DIR__ . '/sql-helper.inc.php';

/**
 * UserRegistration class
 *
 * @param string username
 * @param string password
 * @param object db_connection
 *
 * @method int check_username_exists (Returns the row count for a username)
 * @method void insert_user (Inserts a user into the users table)
 *
 */
class UserRegistration
{
    private $username;
    private $password;
    private $db_connection;

    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();
    }

    /**
    * @method check_username_exists
    *
    * goals of the function include...
    *   1. Retrieve the user data for a specified username
    *   2. Assess whether ot not a username has already been taken
    *   3. Will mainly be used in the UserRegistration Class
    *
    * @param string username
    *
    * @return int (If the integer returned is bigget than zero, then the username exists)
    */

    public function check_username_exists()
    {
        $db_connection = $this->db_connection;

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

        return $num_rows;
    }

    /**
    * @method insert_user
    *
    * goals of the function include...
    *   1. Recieve a username and password
    *   2. Insert the username and password into the users table
    *
    * @return void
    */

    public function insert_user()
    {
        $db_connection = $this->db_connection;

        $statement = $db_connection->prepare("INSERT INTO `users` (username, password) VALUES (?, ?)");

        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
        $statement->bind_param("ss", $this->username, $hashed_password);
        $statement->execute();
        $statement->close();
    }
}
