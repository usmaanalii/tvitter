<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style media="screen">
            * {
                border: 1px solid black;
            }

            div.movie-results {
                border: 1px solid red;
                width: 60%;
                margin: 0 auto;
                height: 30vh;
                overflow: scroll;
            }

            div.single-movie {
                background: #e8e9cc;
                border-bottom: 1px solid red;
            }

            h5.movie-name {
                display: inline-block;
                width: 50%;
                display: ;
                top: 0;
            }

            img.movie-poster {
                vertical-align: bottom;
            }
        </style>
        <title>OMDB API</title>
    </head>
    <body>
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


            $movie = urlencode("avatar");

            $movie_json = file_get_contents($search_url . $movie);

            $search_results = json_decode($movie_json)->Search;

            // Results
            // print_r($search_results);
        ?>

        <div class="movie-results">

        <?php foreach ($search_results as $film_id => $film_details): ?>
            <div class="single-movie">
                <h5 class="movie-name">
                    <?php echo $film_details->Title . ' (' . $film_details->Year . ')'; ?>
                </h5>
                <img class="movie-poster" src="<?php echo $film_details->Poster; ?>" alt="" width="40px" onerror="this.src = '../../../src/images/movie-poster-placeholder.png';">
                <br>
            </div>
            <?php endforeach; ?>

        </div>
    </body>
</html>
