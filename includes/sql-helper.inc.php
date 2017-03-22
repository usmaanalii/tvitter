<?php
    require_once __DIR__  . '/../database-connection.php';

    /**
    * SqlHelper class
    *
    * This will be used as a base for other classes that require database CRUD operations
    *
    * // TODO: Add all new methods
    *
    * @method int user_count (Returns the row count for a username)
    * @method void add_user (Inserts a user into the users table)
    * @method string get_password (Returns the password for a specified
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

        // TODO Change the Docblock
        /**
        * @method get_user_data
        *
        * goals of the function include...
        *   1. Receieve a username
        *   2. Use the username to access it's associated id, username and password
        *   3. Will mainly be used in the UserLogin Class to store session variables
        *
        * @param string username
        *
        * @return array (Containing the user id and username)
        */

        public function get_user_data($username)
        {
            global $db_connection;
            $statement = $db_connection->prepare("SELECT * FROM `users` WHERE username = ?");
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
        public function insert_post($user_id, $post)
        {
            global $db_connection;
            $statement = $db_connection->prepare("INSERT INTO `posts` (user_id, body, `time`) VALUES (?, ?, NOW())");

            $statement->bind_param("ss", $user_id, $post);
            $statement->execute();
            $statement->close();
        }
    }

?>
