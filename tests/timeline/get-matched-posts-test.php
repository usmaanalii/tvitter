<?php
require_once __DIR__ . '/../../database-config.php';

function get_matched_posts($search_query)
{
    global $db_connection;
    if (!($statement = $db_connection->prepare(
        "SELECT users1.username AS 'sender',
                users2.username AS 'recipient',
                posts.post_id AS 'post_id',
                posts.body AS 'body',
                posts.time AS 'time'
                FROM `posts`

        INNER JOIN `users` `users1` ON users1.id = posts.sender_id
        INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

        WHERE posts.body LIKE '%$search_query%'

        ORDER BY posts.time DESC;"))
        ) {
        echo "Prepare failed: (" . $db_connection->errno . ") " . $db_connection->error;
    }

    if (!$statement->execute()) {
        echo "Execute failed: (" . $statement->errno . ") " . $statement->error;
    }
    $returned_posts = $statement->get_result();

    $returned_posts_array = array();

    while ($row = $returned_posts->fetch_array()) {
        array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_id' => $row['post_id'],'post_body' => $row['body'], 'post_time' => $row['time']]);
    }

    return $returned_posts_array;
}

print_r(get_matched_posts("a"));
