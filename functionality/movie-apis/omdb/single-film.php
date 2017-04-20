<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style media="screen">
        </style>
        <title>OMDB API</title>
    </head>
    <body>
        <?php
            // URL's
            $search_url = "http://www.omdbapi.com/?t=";

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


            $movie = urlencode("avatar");

            $movie_json = file_get_contents($search_url . $movie);

            $movie_data = json_decode($movie_json);

            // Keys
            $keys = array(

            );

            foreach ($movie_data as $key => $value) {
                array_push($keys, $key);
            }

            print_r($keys);

            // Results
            // print_r($movie_data);

        ?>

        <img src="<?php echo $movie_data->Poster; ?>" alt="">
    </body>
</html>
