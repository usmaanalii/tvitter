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

            $movie_data = json_decode($movie_json);

            // Keys
            $keys = array(

            );

            foreach ($movie_data as $key => $value) {
                array_push($keys, $key);
            }

            // Results
            // print_r($movie_data);

        ?>

    </body>
</html>
