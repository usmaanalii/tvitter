<?php
require_once __DIR__  . '/../../database-connection.php';

if ($_POST) {
    function delete_post($post_time)
    {

        global $db_connection;
        $statement = $db_connection->prepare("DELETE FROM posts WHERE time = ?");

        $statement->bind_param("s", $post_time);
        $statement->execute();
        $statement->close();
    }

    delete_post($_POST['post-time']);
}

// No closing php tag according to php style guide
