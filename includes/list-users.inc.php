<?php
require_once __DIR__ . '/sql-helper.inc.php';

/**
 * ListUsers Class
 *
 * @param object $db_connection
 *
 * @method array get_all_usernames [Returns array of all usernames]
 * @method array get_all_usernames_info [Returns an array of each username
 * associated with their information]
 */
class ListUsers
{
    private $db_connection;

    function __construct()
    {
        $this->db_connection = SqlHelper::get_db_connection();
    }

    /**
    * @method get_all_usernames
    *
    * goals of the function include...
    *   1. Return all usernames in the users table
    *   2. Will be used to list all users in the 'list-users' page
    *   3. The usernames will be listed using a foreach loop
    *
    *
    * @return array (Containing all usernames)
    */

    public function get_all_usernames()
    {
        $db_connection = $this->db_connection;
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
    * @method get_all_usernames_info
    *
    * goals of the function include...
    *   1. Return all usernames and associated info
    *
    *
    * @return array [contains username[bio], username[email], username[website]]
    */

    public function get_all_usernames_info()
    {
        $db_connection = $this->db_connection;
        $statement = $db_connection->prepare("SELECT `username`, `bio`, `email`, `website` FROM users");
        $statement->execute();
        $returned_usernames = $statement->get_result();

        $all_usernames_info = array();

        while ($row = $returned_usernames->fetch_array()) {
            $username_info =  array();
            $username_info['bio'] = $row['bio'];
            $username_info['email'] = $row['email'];
            $username_info['website'] = $row['website'];
            $all_usernames_info[$row['username']] = $username_info;
        }

        return $all_usernames_info;
    }
}

?>
