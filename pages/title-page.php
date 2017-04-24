<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <?php
            include_once '../components/navigation/loggedin-navigation.php';
        ?>

        <?php

        function movie_details($id)
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
            $movie_json = file_get_contents($search_url . '?' . 'i=' . $id);

            $movie_data = json_decode($movie_json);

            // Keys
            $series_keys = array(
                "Title", "Year", "Rated", "Released", "Runtime", "Genre", "Director", "Writer", "Actors", "Plot", "Language", "Country", "Awards", "Poster", "Metascore", "imdbRating", "imdbVotes", "imdbID", "Type", "totalSeasons", "Response"
            );

            $movie_keys = array(
                "Title", "Year", "Rated", "Released", "Runtime", "Genre", "Director", "Writer", "Actors", "Plot", "Language", "Country", "Awards", "Poster", "Metascore", "imdbRating", "imdbVotes", "imdbID", "Type", "totalSeasons", "Response", "Title", "Year", "Rated", "Released",
                "Runtime", "Genre", "Director", "Writer", "Actors", "Plot", "Language", "Country", "Awards", "Poster", "Ratings", "Metascore", "imdbRating", "imdbVotes", "imdbID", "Type", "DVD", "BoxOffice", "Production", "Website", "Response"
            );

            return $movie_data;

        }
        ?>

        <?php require_once __DIR__ . '/../components/title-page/title-details.php'; ?>
    </div>

</body>
</html>
