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
            $movie_query = urlencode("departed");

            $movie_json = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=c0a98cb80fc4cd2f1ad1556e6dd29f91&language=en-US&query=$movie_query&page=1&include_adult=false");

            $movie_data = json_decode($movie_json);

            // Integer representing how many movies returned by query
            $movies_returned = count($movie_data->results);

            $movie_details = array(
                'title' => $movie_data->results[0]->title,

                'rating' => $movie_data->results[0]->vote_average,

                'poster_url' => $movie_data->results[0]->poster_path,
                'backdrop_url' => $movie_data->results[0]->backdrop_path,
                'overview' => $movie_data->results[0]->overview
            );

            // object
            $genre_ids = $movie_data->results[0]->genre_ids;
            $movie_genre_count = count($movie_data->results[0]->genre_ids);

            // print_r();

            // Genres
            $genre_json = file_get_contents("https://api.themoviedb.org/3/genre/movie/list?api_key=c0a98cb80fc4cd2f1ad1556e6dd29f91&language=en-US");

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
