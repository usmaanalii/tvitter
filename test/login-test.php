<?php

/**
 * SqlHelper class to make CRUD easier
 */
 // Creating the variables and methods to connect to the database
 $db_server = "localhost";
 $db_username = "usy";
 $db_password = "password";
 $db_name = "tvitter_1";

 $web_app = "tvitter";

 // Create the connection
 $db_connection = new mysqli($db_server, $db_username, $db_password, $db_name);

 // Check the connection, and output an error message if unsuccessful
 if ($db_connection->connect_error) {
     die("Connection failed: " . $db_connection->connect_error);
 }
class SqlHelper
{

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

    public function add_user($username, $password)
    {
        global $db_connection;

        $statement = $db_connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        $statement->close();
    }

    public function get_password($username)
    {
        global $db_connection;
        $statement = $db_connection->prepare("SELECT `password` FROM `users` WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($password);

        return $password;
    }
}


    /**
     * UserLogin class
     */
    class UserLogin
    {
        private $username;
        private $password;

        function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }

        // Function - password checker
        // 1. Get username and password from POST form
        // 2. Compare password with the username's password in the database

        public function check_password_match()
        {
            $sql_helper = new SqlHelper();
            // password given by the login form
            $form_password = $this->password;
            $db_password = $sql_helper->get_password($this->username);

            if ($form_password == $db_password) {
                return TRUE;
            } else {
                return FALSE;
            }

        }
    }

    $user = new UserLogin("usy", "password");

    echo $user->check_password_match("usy");
?>
