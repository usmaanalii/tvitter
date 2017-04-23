<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/css/navigation.css">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 5%;
            }

            ul {
                text-align: center;
            }

            #welcome-user-message {
                text-align: center;
            }

            #welcome-user-message span {
                color: rgb(97, 242, 61);
            }

            .profile-image {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 3px solid black;
                display: block;
                margin: 0 auto;
                margin-bottom: 2%;
            }

            form.edit-profile-form {
                margin-bottom: 2px;
            }

            form .edit-profile-button {
                display: block;
                margin: 0 auto;
            }

            /*
                * OMDB API START
             */

             form.search-movie {
                 text-align: center;
                 margin-bottom: 4%;
             }

             form.search-movie input {
                 width: 30%;
                 padding: 0.8% 1.5%;
             }

             div.movie-results {
                 border: 1px solid red;
                 width: 60%;
                 margin: 0 auto;
                 height: 50vh;
                 overflow: scroll;
             }

             div.single-movie {
                 background: #e8e9cc;
                 border-bottom: 1px solid red;
             }

             a.movie-name {
                 display: inline-block;
                 width: 70%;
                 word-wrap: break-word;
                 cursor: pointer;
                 vertical-align: middle;
                 margin-left: 2%;
             }

             a:hover {
                 text-decoration: underline;
             }

             img.movie-poster {
                 vertical-align: middle;
             }

             h4.movie-search-error {
                 text-align: center;
                 color: red;
             }

            /*
                * OMDB API END
             */
            .profile-bio {
                width: 75%;
                display: block;
                margin: 0 auto;
            }

            .profile-bio p {
                padding: 0;
                margin: 0;
                font-size: 1,1em;
                text-align: center;
                color: red;
            }

            #tveet-form {
                text-align: center;
            }

            #tveet-form input {
                display: block;
                margin: 0 auto;
            }

            #tveet-form textarea {
                width: 70%;
                height: 50px;
            }

            #posts-header {
                text-align: center;
            }

            /*
                * HTML in components/profile/posts.php
             */

            .posts-section .post:not(:first-child) {
                margin-top: 3%;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
                word-wrap: break-word;
            }

            .movie-poster {
                margin-top: 2%;
                border: 1px solid black;
                vertical-align: middle;
            }

            .post p.sender-username {
                margin : 0;
                padding: 0;
                display: inline-block;
                font-size: 0.7em;
                font-style: italic;
                float: right;
            }

            .post p.post-body {
                margin-left: 1%;
                position: relative;
                vertical-align: middle;
                display: inline-block;
            }

            h6.post-time {
                display: inline;
                /*margin-left: 95%;*/
                margin-top: 20px;
                color: rgb(184, 178, 178);
            }

            h6.post-time:hover {
                color: rgb(168, 165, 165);
                cursor: none;
            }

            .post .delete-button {
                float: right;
                margin: 0;
                padding: 0;
            }

        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <?php
            include_once '../components/navigation/loggedin-navigation.php';
        ?>

        <?php
            if (!isset($_SESSION)) {
                session_start();
            }
        ?>
        <?php
            // If the user comes from the 'log in' page, then $_SESSION is used
            // If the user comes from the 'Users' (list of all users) paee, then $_GET is used
            $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username'];
        ?>
        <h4 id="welcome-user-message">Welcome <span><?php echo $username ?></span></h4>

        <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

        <?php if ($_SESSION['username'] == $_GET['username']): ?>
            <form class="edit-profile-form" action="../logic/profile.php?username=<?php echo $username; ?>" method="post">
                <input class="edit-profile-button "type="submit" name="edit-profile" value="?">
            </form>
        <?php endif; ?>

        <div class="profile-bio">
            <p>
                <?php
                    require_once __DIR__ . "/../logic/profile.php";

                    echo $current_profile->bio;
                ?>

            </p>
        </div>

        <form class="search-movie" action="profile.php?username=<?php echo $username; ?>" method="post">
            <input type="text" name="movie-name" placeholder="add title" value="<?php echo isset($_POST['movie-name']) ? $_POST['movie-name'] : '' ?>">
        </form>
        <?php
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

            if (isset($_POST['movie-name'])) {
                $movie = urlencode($_POST['movie-name']);
            }
            else {
                $movie = urlencode("");
            }

            $movie_json = file_get_contents($search_url . $movie);

            $search_results = json_decode($movie_json);

            // Results
            // print_r($search_results);
        ?>
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <?php if (array_key_exists('Search', $search_results)): ?>
                <div class="movie-results">
                    <?php foreach ($search_results->Search as $film_id => $film_details): ?>

                    <div class="single-movie">
                        <a class="movie-name" href="../functionality/movie-apis/omdb/single-film-2.php?film-id=<?php echo $film_details->imdbID; ?>&username=<?php echo $username; ?>"><?php echo $film_details->Title . ' (' . $film_details->Year . ')'; ?>
                        </a>
                        <img class="movie-poster" src="<?php echo $film_details->Poster; ?>" alt="" width="50px" onerror="this.src = '../src/images/movie-poster-placeholder.png';">
                        <br>
                    </div>

                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <h4 class="movie-search-error">No results!</h4>
            <?php endif; ?>
        <?php endif; ?>

        <div class="container">

        <div class="posts-section">
            <form id="tveet-form" action="../logic/profile.php?recipient=<?php echo $username ?>" method="post">
                <textarea name="post-message"></textarea>
                <br>
                <input type="submit" name="post-message-submit" value="tveet">
            </form>

        <h2 id="posts-header">Posts</h2>

            <?php
                // individual posts
                require_once __DIR__ . "/../components/profile/posts.php";
            ?>
        </div>
    </div>
    </body>
</html>
