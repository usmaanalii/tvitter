<?php
require_once __DIR__ . "/sql-helper.inc.php";

/**
 * UserProfile class
 *
 * @param integer id
 * @param string username
 * @param string password
 * @param string bio
 * @param string email
 * @param string website
 * @param object db_cnonection
 *
 *
 * @method void insert_post
 * @method array get_posts [retreieves posts for a given id]
 * @method void delete_post [deletes selected post]
 */
class UserProfile
{
    public $id;
    public $username;
    private $password;
    public $bio;
    public $email;
    public $website;

    private $db_connection;


    function __construct($username)
    {
        $sql_helper = new SqlHelper();
        $this->db_connection = $sql_helper->get_db_connection();

        $user_data = $sql_helper->get_user_data($username);

        $this->id = $user_data["id"];
        $this->username = $username;
        $this->password = $user_data["password"];
        $this->bio = $user_data["bio"];
        $this->email = $user_data["email"];
        $this->website = $user_data["website"];
    }

    /**
    * @method insert_post
    *
    * @param
    *
    * goals of the function include...
    *   1. Recieve sender id, recipient id, post text and title
    *   2. Insert these into the posts database
    *
    * @return void [The post will be added to the sql table]
    */
    public function insert_post($sender_id, $recipient_id, $post_body, $title = "")
    {
        $db_connection = $this->db_connection;
        $statement = $db_connection->prepare("INSERT INTO `posts` (sender_id, recipient_id, body, `time`, title) VALUES (?, ?, ?, NOW(), ?)");

        $statement->bind_param("iiss", $sender_id, $recipient_id, $post_body, $title);
        $statement->execute();
        $statement->close();
    }

    /**
     * Retrieve the posts for the current user profile
     * @param  int $id (the current profile user id)
     * @return array (associative array containing the sender's username, recipient's username, post id, post body, title and post time)
     */
     public function get_posts($id = null)
     {
         $db_connection = $this->db_connection;

         $statement = $db_connection->prepare(
             "SELECT users1.username AS 'sender',
                     users2.username AS 'recipient',
                     posts.post_id AS 'post_id',
                     posts.body AS 'body',
                     posts.title AS 'title',
                     posts.time AS 'time'
                     FROM `posts`

             INNER JOIN `users` `users1` ON users1.id = posts.sender_id
             INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

             WHERE posts.recipient_id = ? OR posts.sender_id

             ORDER BY posts.time DESC;"
         );

         $id = !$id ? $this->id : $id;

         $statement->bind_param("i", $this->id);
         $statement->execute();
         $returned_posts = $statement->get_result();

         $returned_posts_array = array();

         while ($row = $returned_posts->fetch_array()) {
             array_push($returned_posts_array, ['sender_username' => $row['sender'], 'recipient_username' => $row['recipient'], 'post_id' => $row['post_id'],'post_body' => $row['body'], 'title' => $row['title'], 'post_time' => $row['time']]);
         }

         return $returned_posts_array;
     }

    /**
     * [Used to delete the post when the user clicks the
     * associated posts' delete button]
     * @param  [int]  $post_id [the post id from the
     * posts table in the database]
     * @return [void]
     */
    public function delete_post($post_id)
    {
        $db_connection = $this->db_connection;
        if (!($statement = $db_connection->prepare("DELETE FROM posts WHERE post_id = ?"))) {
            echo "Prepare failed: (" . $db_connection->errno . ") " . $db_connection->error;
        }
        if (!$statement->bind_param("i", $post_id)) {
            echo "Binding parameters failed: (" . $statement->errno . ") " . $statement->error;
        }

        if (!$statement->execute()) {
            echo "Execute failed: (" . $statement->errno . ") " . $statement->error;
        }

        $statement->close();
    }

    /**
     * [Used to retrieve the search results from the OMDB API]
     * @param  [string] $title [the title, the user is trying to
     * add to the current post]
     * @return [object]        [list of titles]
     */

    public static function search_title($title)
    {
        // URL's
        // Uses s=
        $search_url = "http://www.omdbapi.com/?s=";

        // Parameters
        $search_params = array(
            'type' => 'movie, series or episode',
            'y' => 'year of release',
            'r' => 'json or xml',
            'page' => '1-100',
            'callback' => 'JSONP callback name',
            'v' => 'API version'
        );

        if (isset($title)) {
            $movie = urlencode($title);
        }
        else {
            $movie = urlencode("");
        }

        $movie_json = file_get_contents($search_url . $movie);

        $results = json_decode($movie_json);

        return $results;
    }

    /**
     * [returns the url for the title added, used to dispay the poster img tag
     * of each post]
     *
     * @param  [string] $title [the title of the poster required]
     * @return [string]        [the url used to locate the image]
     */
    public static function get_poster_url($title)
    {
        // URL's
        // Uses s=
        $search_url = "http://www.omdbapi.com/?t=";

        // Parameters
        $search_params = array(
            'type' => 'movie, series or episode',
            'y' => 'year of release',
            'r' => 'json or xml',
            'page' => '1-100',
            'callback' => 'JSONP callback name',
            'v' => 'API version'
        );

        if (isset($title)) {
            $movie = urlencode($title);
        }
        else {
            $movie = urlencode("");
        }

        $movie_json = file_get_contents($search_url . $movie);

        $results = json_decode($movie_json);

        $poster_url = isset($results->Poster) ? $results->Poster: '';

        return $poster_url;
    }

    /**
     * [retrieve specific details about the title requested]
     * @param  [string] $title [name of the title]
     * @return [object]        [represents the details of the title]
     */
    public static function get_title_details($title)
    {
        // URL's
        $search_url = "http://www.omdbapi.com/";

        // Parameters
        $search_params = array(
            'i' => 'imdb id',
            't' => 'title',
            'type' => 'movie, series or episode',
            'plot' => 'short, full',
            'r' => 'json or xml',
            'callback' => 'JSONP callback name',
            'v' => 'API version'
        );

        // Building a search
        $movie_json = file_get_contents($search_url . '?' . 't=' . $title);
        $movie_data = json_decode($movie_json);

        // Results
        return $movie_data;
    }
}
