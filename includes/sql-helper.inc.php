<?php
require_once __DIR__  . '/../database-config.php';

/**
* SqlHelper class
*
* Used by other classes to connect to the SQL database
*
* @method int user_count (Returns the row count for a username)
* @method void add_user (Inserts a user into the users table)
*
*/

class SqlHelper
{
    /**
     * [provides the database connection from the database-config file]
     * @return [object] [represents the connection to the database]
     */
    public static function get_db_connection()
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
    * @return array (Containing the user id, username, password bio,
    * email and website)
    */
    public static function get_user_data($username)
    {
        global $db_connection;
        $statement = $db_connection->prepare("SELECT `id`, `username`, `password`, `bio`, `email`, `website` FROM `users` WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($id_returned, $username_returned, $password_returned, $bio_returned, $email_returned, $website_returned);

        while ($statement->fetch()) {
            $db_id = $id_returned;
            $db_username = $username_returned;
            $db_password = $password_returned;
            $db_bio = !empty($bio_returned) ? $bio_returned: "No bio";
            $db_email = !empty($email_returned) ? $email_returned: "No email";
            $db_website = !empty($website_returned) ? $website_returned: "No website";
        }

        $statement->close();

        return array(
            "id" => $db_id,
            "username" => $db_username,
            "password" => $db_password,
            "bio" => $db_bio,
            "email" => $db_email,
            "website" => $db_website
        );
    }

    public static function sanitizeString($input)
    {
        global $db_connection;
        $input = strip_tags($input);
        $input = htmlentities($input);
        $input = stripslashes($input);

        return $input;
    }
}
