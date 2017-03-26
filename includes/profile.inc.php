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
 * @method void insert_post_data
 */
class UserProfile
{
    public $id;
    public $username;
    private $password;
    public $bio;

    public $sql_helper;


    function __construct($username)
    {
        $sql_helper = new SqlHelper();

        $this->sql_helper = $sql_helper;
        $user_data = $sql_helper->get_user_data($username);

        $this->id = $user_data["id"];
        $this->username = $username;
        $this->password = $user_data["password"];
        $this->bio = $user_data["bio"];
    }

    /**
     * takes the $_POST data from the 'tveet' form on user profile pages
     * and inserts into the database the following columns
     * (post_id, sender_id, recipient_id, time, body)
     * @param  int $sender_id [the id of the user posting the message, which will be the user currently logged in, tracked by the $_SESSION]
     * @param  int $recipient_id [the id of the profile on which the message is being posted, tracked by $_GET['username']]
     * @param  string $post [the contents of the post]
     *
     * @return void [...]
     */
    public function insert_post_data($sender_id, $recipient_id, $post)
    {
        $sql_helper = new SqlHelper();

        $sql_helper->insert_post($sender_id, $recipient_id, $post);
    }
}

// No closing php tag according to php style guide
