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
        $statement = $db_connection->prepare("SELECT users.username, posts.body FROM `posts` INNER JOIN `users` ON users.id = posts.sender_id WHERE posts.recipient_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $returned_posts = $statement->get_result();

        $returned_posts_array = array();

        while ($row = $returned_posts->fetch_array()) {
            array_push($returned_posts_array, ['sender_username' => $row['username'], 'post_body' => $row['body']]);
        }

        return $returned_posts_array;
    }


    $posts = get_user_posts(1);

    foreach ($posts as $post) {
        if ($post['sender_username'] == 'usy') {
            $post['sender_username'] = "";
        }

        echo $post['sender_username'] . ' ' . $post['post_body'] . '<br>';
    }

    // $test = array(1 => 'one');
    // if ($test[1] == 'one') {
    //     $test[1] = 'two';
    // }
    //
    //
    // print_r($test);

?>
