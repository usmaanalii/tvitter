<?php
require_once __DIR__ . '/sql-helper.inc.php';

/**
 * ListUsers Class
 *
 * @param object $db_connection
 *
 * @method array get_all_usernames (Returns array of all usernames)
 */
class ListUsers
{
    private $db_connection;

    function __construct()
    {
        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();
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
}

?>
