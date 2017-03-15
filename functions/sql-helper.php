<?php
    function user_count($username)
    {
        global $db_connection;
        $statement = $db_connection->prepare("SELECT * FROM `users` WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();

        $num_rows = $statement->num_rows;

        return $num_rows;
    }

    function add_user($username, $password)
    {
        global $db_connection;

        $statement = $db_connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        $statement->close();
    }

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
?>
