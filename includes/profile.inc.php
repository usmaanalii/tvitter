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
 * @method void insert_post
 * @method array get_posts [retreieves posts for a given id]
 * @method void delete_post [deletes selected post]
 */
class UserProfile
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
    * @method insert_post
    *
    * goals of the function include...
    *   1. Recieve a string and user id
    *   2. Insert the string and user id into the posts table
    *   3. The user id will act as a foriegn key so that the get_posts method can display user specific posts for each profile
    *
    *
    * @return void (The post will be added to the table)
    */
    public function insert_post($sender_id, $recipient_id, $post)
    {
        $db_connection = $this->db_connection;
        $statement = $db_connection->prepare("INSERT INTO `posts` (sender_id, recipient_id, body, `time`) VALUES (?, ?, ?, NOW())");

        $statement->bind_param("iis", $sender_id, $recipient_id, $post);
        $statement->execute();
        $statement->close();
    }

    /**
     * Retrieve the posts for the current user profile
     * @param  int $profile_id (the current profile user id)
     * @return array (associative array containing the sender's username, recipient's username, post id, body and time)
     */
    public function get_posts($id = null)
    {
        $db_connection = $this->db_connection;

        $statement = $db_connection->prepare(
            "SELECT users1.username AS 'sender',
                    users2.username AS 'recipient',
                    posts.post_id AS 'post_id',
                    posts.body AS 'body',
                    posts.time AS 'time'
                    FROM `posts`


            INNER JOIN `users` `users1` ON users1.id = posts.sender_id
            INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

            WHERE posts.recipient_id = ?

            ORDER BY posts.time DESC;"
        );

        $id = !$id ? $this->id : $id;

        $statement->bind_param("i", $this->id);
        $statement->execute();
        $returned_posts = $statement->get_result();

        $returned_posts_array = array();

        while ($row = $returned_posts->fetch_array()) {
            array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_id' => $row['post_id'], 'post_body' => $row['body'], 'post_time' => $row['time']]);
        }

        return $returned_posts_array;
    }

    /**
     * TODO: Docblock
     * [delete_post description]
     * @param  [type]  $post_id [description]
     * @return {[type]            [description]
     */
    public function delete_post($post_id)
    {
        $db_connection = $this->db_connection;
        if (!($statement = $db_connection->prepare("DELETE FROM posts WHERE post_id = ?"))) {
            echo "Prepare failed: (" . $db_connection->errno . ") " . $db_connection->error;
        }
        if (!$statement->bind_param("i", $post_id)) {
            echo "Binding parameters failed: (" . $statement->errno . ") " . $statement->error;
        }

        if (!$statement->execute()) {
            echo "Execute failed: (" . $statement->errno . ") " . $statement->error;
        }

        $statement->close();
    }
}

// No closing php tag according to php style guide
