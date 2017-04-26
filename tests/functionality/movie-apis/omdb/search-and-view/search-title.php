<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/search-title.js"></script>
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 2%;
            }

            form.search-movie {
                text-align: center;
                margin-bottom: 4%;
            }

            form.search-movie input[type="text"] {
                width: 40%;
                padding: 0.8% 1.5%;
            }

            div.movie-results {
                border: 1px solid red;
                margin: 0 auto;
                height: 24vh;
                overflow: scroll;
            }

            div.single-movie {
                background: #e8e9cc;
                border-bottom: 1px solid red;
            }

            a.movie-link {
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

            h3, h4 {
                text-align: center;
            }

            h3 + img, #movie-web-link {
                display: block;
                margin: 0 auto;
                text-align: center;
            }

            h4 {
                color: blue;
            }
            .error {
                color: red;
            }
        </style>
        <title>OMDB API</title>
    </head>
    <body>

        <div class="container">

        <form class="search-movie" action="search-title.php" method="post">
            <input id="search-movie-query" type="text" name="movie-name" placeholder="add title" value="<?php echo isset($_POST['movie-name']) ? $_POST['movie-name'] : '' ?>">
            <input type="submit" name="search-film-submit" value="Search">
        </form>

        <div class="ajax-response">

        </div>

        <div class="title-details">

        </div>

        </div>

    </body>
</html>
