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
    public function get_db_connection()
    {
        global $db_connection;

        return $db_connection;
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
}

// No closing php tag according to php style guide
