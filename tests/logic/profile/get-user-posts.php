<?php
    require_once __DIR__  . '/../../../database-connection.php';

    /**
     * [get_user_posts description]
     * @param  [type]  profile_id [description]
     * @return {[type]          [description]
     */
    function get_user_posts($id)
    {
        global $db_connection;
        $statement = $db_connection->prepare(
            "SELECT users1.username AS 'sender',
                    users2.username AS 'recipient',
                    posts.body AS 'body' FROM `posts`

            INNER JOIN `users` `users1` ON users1.id = posts.sender_id
            INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

            WHERE posts.recipient_id = ?;"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        $returned_posts = $statement->get_result();

        $returned_posts_array = array();

        while ($row = $returned_posts->fetch_array()) {
            array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_body' => $row['body']]);
        }

        return $returned_posts_array;
    }


    $test = get_user_posts(1);

    print_r($test);


?>
