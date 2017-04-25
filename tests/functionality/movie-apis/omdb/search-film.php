<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/search-film.js"></script>
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            form.search-movie {
                text-align: center;
                margin-bottom: 4%;
            }

            form.search-movie input[type="text"] {
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
        </style>
        <title>OMDB API</title>
    </head>
    <body>
        <form class="search-movie" action="search-film.php" method="post">
            <input id="search-movie-query" type="text" name="movie-name" placeholder="add title" value="<?php echo isset($_POST['movie-name']) ? $_POST['movie-name'] : '' ?>">
            <input type="submit" name="search-film-submit" value="Search">
        </form>

        <div class="ajax-response">

        </div>

    </body>
</html>
