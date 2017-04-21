<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

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
                height: 80vh;
                overflow: scroll;
            }

            div.single-movie {
                background: #e8e9cc;
                border-bottom: 1px solid red;
            }

            form.movie-selection-form {
                display: inline;
            }

            form.movie-selection-form h6 {
                display: none;
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
        </style>
        <title>OMDB API</title>
    </head>
    <body>
        <form class="search-movie" action="search-film.php" method="post">
            <input type="text" name="movie-name" placeholder="e.g. avatar">
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
                $movie = urlencode("avatar");
            }

            $movie_json = file_get_contents($search_url . $movie);

            $search_results = json_decode($movie_json)->Search;

            // Results
            // print_r($search_results);
        ?>

        <div class="movie-results">

            <?php
            $i = 0;
            foreach ($search_results as $film_id => $film_details):
            ?>
            <div class="single-movie">
                <form class="movie-selection-form" id="search-result<?php echo $i; ?>" method="post" action="single-film.php">
                    <input type="hidden" name="movie-id" value="<?php echo $film_details->imdbID; ?>" />
                    <a class="movie-name" onclick="document.getElementById('search-result<?php echo $i; ?>').submit();"><?php echo $film_details->Title . ' (' . $film_details->Year . ')'; ?>
                    </a>
                </form>
                <img class="movie-poster" src="<?php echo $film_details->Poster; ?>" alt="" width="50px" onerror="this.src = '../../../src/images/movie-poster-placeholder.png';">
                <br>
            </div>
            <?php
            $i++;
            ?>
            <?php endforeach; ?>

        </div>
    </body>
</html>
