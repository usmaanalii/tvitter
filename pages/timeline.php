<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../src/css/header.css">
        <link rel="stylesheet" href="../src/css/center-page.css">
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

            .posts-section .post:not(:first-child) {
                margin-top: 3%;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
                word-wrap: break-word;
            }

            .post-usernames {
                margin : 0;
                padding: 0;
                display: inline-block;
                font-size: 0.7em;
                font-style: italic;
                float: right;
            }

            .post p.post-body {
                font-size: 0.9em;
                margin-bottom: 1%; /* dependency with delete-post-button margin */
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

            .post .delete-post-button {
                background: none;
                outline: none;
                border: none;
                float: right;
                padding : 0;
                margin-top: 7.8%;
                color: rgb(168, 165, 165);
                cursor: pointer;
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
    <?php
        require_once __DIR__ . "/../logic/timeline.php";
    ?>

    <div class="container">

        <?php
            include_once '../components/headers/loggedin-header.php';
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
