<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }
            img {
                margin: 20px;
                border: 3px solid black;
            }
        </style>
        <title>Movie Image</title>
    </head>
    <body>
        <?php require_once 'search-movie.php'; ?>

        <h1><?php echo $movie_details['title']; ?></h1>

        <h3>Rating: <?php echo $movie_details['rating']; ?></h3>

        <h3>Genres:
            <?php
            for ($i = 0; $i < $movie_genre_count; $i++) {
                echo $genres[$genre_ids[$i]] . ' ';
            }
            ?>
        </h3>

        <?php
            $poster_url = $movie_details['poster_url'];
            $backdrop_url = $movie_details['backdrop_url'];
        ?>

        <img src="<?php echo "http://image.tmdb.org/t/p/w92$poster_url"?>" alt="X">
        <img src="<?php echo "http://image.tmdb.org/t/p/w300$backdrop_url"?>" alt="X">

        <p><?php echo $movie_details['overview']; ?></p>
    </body>
</html>
