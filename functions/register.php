<?php  
    /**
    * check_user function
    *
    * goals of the function include...
    *   1. Check post data has been added via the registration form
    *   2. Check the posted username is not taken in the database
    *
    * @param string $registered_username (Post data from username field)
    * @param string $registered_password (Post data from password field)
    *
    * @return bool (indicates username unique or already taken)
    */

    function check_user($registered_username, $registered_password="")
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = mysql_real_escape_string($registered_username);
        $password = mysql_real_escape_string($registered_password);

        global $db_connection;

        $statement = $db_connection->prepare("SELECT * FROM `users` WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();

        $num_rows = $statement->num_rows;

        if ($num_rows > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    } else {
        return FALSE;
    }
    }
    /**
    * insert_user function
    *
    * goals of the function include...
    *   1. Insert the username and password into the database
    *
    * @param string $registered_username (Post data from username field)
    * @param string $registered_password (Post data from password field)
    *
    * @return void
    */
    function insert_user($registered_username, $registered_password)
    {
        global $db_connection;

        $statement = $db_connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $statement->bind_param("ss", $registered_username, $registered_password);
        $statement->execute();
        $statement->close();
    }

?>
