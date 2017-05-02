<?php
require_once __DIR__ . "/sql-helper.inc.php";

/**
 * UserProfile class
 *
 * @param integer id
 * @param string username
 * @param string password
 * @param string bio
 *
 *
 * @method void update_profile
 *
 */
class EditProfile
{
    public $id;
    public $username;
    private $password;

    private $db_connection;


    function __construct($username)
    {
        $this->db_connection = SqlHelper::get_db_connection();

        $user_data = SqlHelper::get_user_data($username);

        $this->id = $user_data["id"];
        $this->username = $username;
        $this->password = $user_data["password"];
    }

    /**
     * [used to add further details to a use rprofile]
     * @param  [string]  $bio     [biography for the user]
     * @param  [string]  $email   [email for the user]
     * @param  [string]  $website [wesbite for the user]
     * @return [void]
     */
    public function update_profile($bio, $email, $website)
    {
        $db_connection = $this->db_connection;

        $statement = $db_connection->prepare("UPDATE users SET bio = ?, email = ?, website = ? WHERE id = ?");

        $statement->bind_param("sssi", $bio, $email, $website, $this->id);

        $statement->execute();

        $statement->close();
    }

}
