<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style media="screen">
            * {
                border: 1px solid black;
            }

            h2 {
            }

            img {
                border: 3px solid black;
            }

            div.single-film:nth-of-type(even) {
                /*margin-top: 10px;*/
                border: 4px solid red;
            }
        </style>
        <title>Search ResultsImage</title>
    </head>
    <body>
        <?php require_once 'search-movie.php'; ?>

        <?php   // All movies returned
                for ($i = 0; $i < $movies_returned; $i++) {
                $movie_details = array(
                    'title' => $movie_data->results[$i]->title,

                    'rating' => $movie_data->results[$i]->vote_average,

                    'poster_url' => $movie_data->results[$i]->poster_path,
                    'backdrop_url' => $movie_data->results[$i]->backdrop_path,
                    'overview' => $movie_data->results[$i]->overview
                ); ?>

                <div class="single-film">
                    <h2>
                        <?php echo $movie_details['title']; ?>
                    </h2>

                    <img src="http://image.tmdb.org/t/p/w92<?php echo $movie_details['poster_url']; ?>" alt="Movie Poster" onerror="this.src='../../../src/images/movie-poster-placeholder.png'" wiodth="98" height="144">
                </div>


                <br>

        <?php } ?>

    </body>
</html>
