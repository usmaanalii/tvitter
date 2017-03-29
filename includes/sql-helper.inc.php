<?php
require_once __DIR__  . '/../database-connection.php';

/**
* SqlHelper class
*
* This will be used as a base for other classes that require database CRUD operations
*
* TODO: Add all new methods
* TODO: methods that insert into the database to return TRUE?
*
* @method int user_count (Returns the row count for a username)
* @method void add_user (Inserts a user into the users table)
* @method array get_user_daa (Returns all user data in a associative array)
* @method array get_all_usernames (Returns array of all usernames)
* @method void insert_post (Inserts post into posts table)
* @method array get_user_posts (Returns data about each post for a given id)
* @method array get_all_posts (Returns data about all posts in posts table)
*
*/

class SqlHelper
{

    /**
    * @method user_count
    *
    * goals of the function include...
    *   1. Retrieve the user data for a specified username
    *   2. Assess whether ot not a username has already been taken
    *   3. Will mainly be used in the RegisterUser Class
    *
    * @param string username
    *
    * @return int (If the integer returned is bigget than zero, then the username exists)
    */

    public function user_count($username)
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

        return $num_rows;
    }

    /**
    * @method add_user
    *
    * goals of the function include...
    *   1. Recieve a username and password
    *   2. Insert the username and password into the users table
    *
    * @param string username
    * @param string password
    *
    * @return void ** May need to add error check **
    */

    public function add_user($username, $password)
    {
        global $db_connection;

        $statement = $db_connection->prepare("INSERT INTO `users` (username, password) VALUES (?, ?)");
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        $statement->close();
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

    public function get_user_data($username)
    {
        global $db_connection;
        $statement = $db_connection->prepare("SELECT `id`, `username`, `password`, `bio` FROM `users` WHERE username = ?");
        $statement->bind_param("s", $username);
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

    /**
    * @method get_all_usernames
    *
    * goals of the function include...
    *   1. Return all usernames in the users table
    *   2. Will be used to list all users in the 'listusers-page'
    *   3. The usernames will be listed using a foreach loop
    *
    *
    * @return array (Containing all usernames)
    */
    public function get_all_usernames()
    {
        global $db_connection;
        $statement = $db_connection->prepare("SELECT `username` FROM `users`");
        $statement->execute();
        $returned_usernames = $statement->get_result();

        $usernames_array = array();

        while ($row = $returned_usernames->fetch_array()) {
            array_push($usernames_array, $row['username']);
        }

        return $usernames_array;
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
        global $db_connection;
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
    public function get_user_posts($id)
    {
        global $db_connection;
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
        $statement->bind_param("i", $id);
        $statement->execute();
        $returned_posts = $statement->get_result();

        $returned_posts_array = array();

        while ($row = $returned_posts->fetch_array()) {
            array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_id' => $row['post_id'], 'post_body' => $row['body'], 'post_time' => $row['time']]);
        }

        return $returned_posts_array;
    }

    /**
     * Retrieve the posts from all users
     *
     * @return array (associative array containing the sender's username, recipient's username, post id, post body and post time)
     */
    public function get_all_posts()
    {
        global $db_connection;
        $statement = $db_connection->prepare(
            "SELECT users1.username AS 'sender',
                    users2.username AS 'recipient',
                    posts.post_id AS 'post_id',
                    posts.body AS 'body',
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
            array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_id' => $row['post_id'],'post_body' => $row['body'], 'post_time' => $row['time']]);
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
        global $db_connection;
        $statement = $db_connection->prepare("DELETE FROM posts WHERE post_id = ?");

        $statement->bind_param("i", $post_id);
        $statement->execute();
        $statement->close();
    }


    public function insert_edit_bio($user_id, $bio, $email, $website)
    {
        global $db_connection;

        $statement = $db_connection->prepare("UPDATE users SET bio = ?, email = ?, website = ? WHERE id = ?");

        $statement->bind_param("sssi", $bio, $email, $website, $user_id);

        $statement->execute();

        $statement->close();
    }
}

// No closing php tag according to php style guide
