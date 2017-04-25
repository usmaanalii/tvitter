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

            p {
                font-size: 0.9em;
            }

            h2 {
                text-align: center;
            }

            form.search-posts {
                margin-bottom: 3%;
            }

            form.search-posts input[type="text"] {
                width: 97.25%;
                padding: 1%;
            }

            /* Posts (START)
            =============================================================== */

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
                margin-top: 4%;
                border: 1px solid black;
            }

            .post-usernames {
                margin : 0;
                padding: 0;
                display: inline-block;
                font-size: 0.7em;
                font-style: italic;
                float: right;
            }

            a.movie-link {
                display: inline;
            }

            .post p.post-body {
                border: 1px solid black;
            }

            h6.post-time {
                display: block;
                color: rgb(184, 178, 178);

                padding: 0;

                margin: 1% 0;
            }

            h6.post-time:hover {
                color: rgb(168, 165, 165);
                cursor: none;
            }

            form.delete-post-form {
                margin-bottom: 1.5em;
            }

            .post .delete-button {
                background: red;
                float: right;
                margin: 0;
                margin-bottom: 1%;
                padding: 0;
            }

            /* Posts (END)
            =============================================================== */
        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <?php
        require_once __DIR__ . "/../logic/timeline.php";
    ?>

    <div class="container">

        <?php
            include_once '../components/navigation/navigation-links.php';
        ?>
        <br><br>
        <h2>Timeline</h2>

        <form class="search-posts" action="timeline.php?username=<?php echo $_SESSION['username']; ?>" method="post">
            <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
            <input type="text" name="search-input" placeholder="e.g. game of thrones">
        </form>

        <div class="posts-section">
            <?php
                // individual posts
                require_once __DIR__ . "/../components/timeline/posts.php";
            ?>
        </div>
    </div>
</html>
