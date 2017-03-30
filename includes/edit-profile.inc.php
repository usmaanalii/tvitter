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
 * TODO: Add all new methods
 *
 * @method void update_profile
 * 
 */
class EditProfile
{
    public $id;
    public $username;
    private $password;
    public $bio;

    private $db_connection;


    function __construct($username)
    {
        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();

        $user_data = $sql_helper->get_user_data($username);

        $this->id = $user_data["id"];
        $this->username = $username;
        $this->password = $user_data["password"];
        $this->bio = $user_data["bio"];
    }

    /**
     * TODO: Docblock
     * [update_profile description]
     * @param  [type]  $bio     [description]
     * @param  [type]  $email   [description]
     * @param  [type]  $website [description]
     * @return {[type]          [description]
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

// No closing php tag according to php style guide
