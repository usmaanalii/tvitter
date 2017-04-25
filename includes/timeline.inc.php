<?php
require_once __DIR__ . '/sql-helper.inc.php';
require_once __DIR__ . "/profile.inc.php";

/**
 * Timeline Class
 *
 * @param object $db_connection
 *
 * @method array get_all_posts (Returns data about all posts in posts table)
 * @method void delete_post (Deletes the selected post)
 */
class Timeline extends UserProfile
{
    private $db_connection;

    function __construct()
    {
        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();
    }

    /**
     * Retrieve the posts from all users
     *
     * @return array (associative array containing the sender's username, recipient's username, post id, post body and post time)
     */
    public function get_all_posts()
    {
        $db_connection = $this->db_connection;
        $statement = $db_connection->prepare(
            "SELECT users1.username AS 'sender',
                    users2.username AS 'recipient',
                    posts.post_id AS 'post_id',
                    posts.body AS 'body',
                    posts.title AS 'title',
                    posts.time AS 'time'
                    FROM `posts`

            INNER JOIN `users` `users1` ON users1.id = posts.sender_id
            INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

            ORDER BY posts.time DESC;"
        );
        $statement->execute();
        $returned_posts = $statement->get_result();

        $returned_posts_array = array();

        while ($row = $returned_posts->fetch_array()) {
            array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_id' => $row['post_id'],'post_body' => $row['body'], 'title' => $row['title'], 'post_time' => $row['time']]);
        }

        return $returned_posts_array;
    }

    /**
     * TODO: DOCBLOCK
     * TODO: Use parent class method from UserProfile
     * [delete_post description]
     * @param  [type]  $post_id [description]
     * @return {[type]          [description]
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

    public function get_matched_posts($search_input)
    {
        $db_connection = $this->db_connection;
        $statement = $db_connection->prepare(
            "SELECT users1.username AS 'sender',
                    users2.username AS 'recipient',
                    posts.post_id AS 'post_id',
                    posts.body AS 'body',
                    posts.title AS 'title',
                    posts.time AS 'time'

            FROM `posts`

            INNER JOIN `users` `users1` ON users1.id = posts.sender_id
            INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

            WHERE posts.body OR posts.title LIKE '%$search_input%'

            ORDER BY posts.time DESC;"
        );
        $statement->execute();
        $returned_posts = $statement->get_result();

        $returned_posts_array = array();

        while ($row = $returned_posts->fetch_array()) {
            array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_id' => $row['post_id'],'title' => $row['title'], 'post_body' => $row['body'], 'post_time' => $row['time']]);
        }

        return $returned_posts_array;
    }
}
