<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style media="screen">
        </style>
        <title>TMDB API</title>
    </head>
    <body>
        <?php
            $title_query = urlencode("departed");

            $title_json = file_get_contents("https://api.thetitledb.org/3/search/title?api_key=c0a98cb80fc4cd2f1ad1556e6dd29f91&language=en-US&query=$title_query&page=1&include_adult=false");

            $title_data = json_decode($title_json);

            // Integer representing how many titles returned by query
            $titles_returned = count($title_data->results);

            $title_details = array(
                'title' => $title_data->results[0]->title,

                'rating' => $title_data->results[0]->vote_average,

                'poster_url' => $title_data->results[0]->poster_path,
                'backdrop_url' => $title_data->results[0]->backdrop_path,
                'overview' => $title_data->results[0]->overview
            );

            // object
            $genre_ids = $title_data->results[0]->genre_ids;
            $title_genre_count = count($title_data->results[0]->genre_ids);

            // print_r();

            // Genres
            $genre_json = file_get_contents("https://api.thetitledb.org/3/genre/title/list?api_key=c0a98cb80fc4cd2f1ad1556e6dd29f91&language=en-US");

            $genre_data = json_decode($genre_json);

            $genre_count = count($genre_data->genres);

            $genres = array(

            );

            for ($i = 0; $i < $genre_count; $i++) {
                $genres[$genre_data->genres[$i]->id] = $genre_data->genres[$i]->name;
            }

        ?>

    </body>
</html>
