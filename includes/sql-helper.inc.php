<?php
    require_once __DIR__  . '/../database-connection.php';

    /**
    * SqlHelper class
    *
    * This will be used as a base for other classes that require database CRUD operations
    *
    * @method int user_count (Returns the row count for a username)
    * @method void add_user (Inserts a user into the users table)
    * @method string get_password (Returns the password for a specified user)
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
            $statement = $db_connection->prepare("SELECT * FROM `users` WHERE username = ?");
            $statement->bind_param("s", $username);
            $statement->execute();
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

            $statement = $db_connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $statement->bind_param("ss", $username, $password);
            $statement->execute();
            $statement->close();
        }

        /**
        * @method get_password
        *
        * goals of the function include...
        *   1. Receieve a username
        *   2. Use the username to access it's associated password in the users table
        *   3. Will mainly be used in the UserLogin Class to assess password validity
        *
        * @param string username
        *
        * @return int (If the integer returned is bigget than zero, then the username exists)
        */

        function get_password($username)
        {
            global $db_connection;
            $statement = $db_connection->prepare("SELECT `password` FROM `users` WHERE username = ?");
            $statement->bind_param("s", $username);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($password);

            while ($statement->fetch()) {
                $db_password = $password;
            }

            $statement->close();
            return $db_password;
        }

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
            $statement = $db_connection->prepare("SELECT `id`, `username` FROM `users` WHERE username = ?");
            $statement->bind_param("s", $username);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($id, $username_returned);

            while ($statement->fetch()) {
                $db_id = $id;
                $db_username = $username_returned;
            }

            $statement->close();

            return array(
                "id" => $db_id,
                "username" => $db_username
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

        // TODO Docblock: Might change it to 'get_user_data'
        public function get_user_bio($username)
        {
            global $db_connection;
            $statement = $db_connection->prepare("SELECT `bio` FROM `users` WHERE username = ?" );
            $statement->bind_param("s", $username);
            $statement->execute();
            $statement->store_result();

            $num_rows = $statement->num_rows;


            if ($num_rows > 0) {

                $statement->bind_result($bio);

                while ($statement->fetch()) {
                    $db_bio = !empty($bio) ? $bio : "No bio";
                }
            } else {
                $db_bio = "No bio";
            }

            $statement->close();

            return $db_bio;
        }
    }

?>
