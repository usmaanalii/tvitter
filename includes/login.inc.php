<?php
require_once __DIR__ . '/sql-helper.inc.php';

/**
 * UserRegistration class
 *
 * @param string username
 * @param string password
 *
 * TODO: Add all new methods
 *
 * @method bool check_password_match (compare form password with database password)
 * @method array get_user_data (used to id, username etc.. for the user logging in)
 *
 */
class UserLogin
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
        $db_connection = $this->db_connection;

        $login_form_password = $this->password;

        $statement = $db_connection->prepare("SELECT `password` FROM `users` WHERE username = ?");
        $statement->bind_param("s", $this->username);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($password_returned);

        while ($statement->fetch()) {
            $db_password = $password_returned;
        }

        $statement->close();

        return password_verify($login_form_password, $db_password);

    }

    /**
    * @method get_user_data
    *
    * goals of the function include...
    *   1. Receieve a username
    *   2. Use the username to access it's details
    *
    * @param string username
    *
    * @return array (Containing the user id, username, password and bio)
    */
    public function get_user_data()
    {
        $db_connection = $this->db_connection;
        $statement = $db_connection->prepare("SELECT `id`, `username`, `password`, `bio` FROM `users` WHERE username = ?");
        $statement->bind_param("s", $this->username);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($id_returned, $username_returned, $password_returned, $bio_returned);

        while ($statement->fetch()) {
            $db_id = $id_returned;
            $db_username = $username_returned;
            $db_password = $password_returned;
            $db_bio = !empty($bio_returned) ? $bio_returned: "No bio";
        }

        $statement->close();

        return array(
            "id" => $db_id,
            "username" => $db_username,
            "password" => $db_password,
            "bio" => $db_bio
        );
    }
}

// No closing php tag according to php style guide
