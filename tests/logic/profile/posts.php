<?php
    require_once __DIR__  . '/../../../database-connection.php';

    /**
     * [get_user_posts description]
     * @param  [type]  $user_id [description]
     * @return {[type]          [description]
     */
    function get_user_posts($user_id)
    {
        global $db_connection;
        $statement = $db_connection->prepare("SELECT `body` FROM `posts` WHERE `user_id` = ?");
        $statement->bind_param("i", $user_id);
        $statement->execute();
        $returned_posts = $statement->get_result();

        $returned_posts_array = array();

        while ($row = $returned_posts->fetch_array()) {
            array_push($returned_posts_array, $row['body']);
        }

        return $returned_posts_array;
    }

    $posts = get_user_posts(1);
    foreach ($posts as $post) {
        echo $post . '<br>';
    }

?>
