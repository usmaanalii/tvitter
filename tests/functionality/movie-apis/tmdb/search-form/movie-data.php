<?php
    if (isset($_POST['movie-search-input'])) {
        $movie = $_POST['movie-search-input'];
    } else {
        $movie = $_GET['movie'];
    }

    $movie_query = urlencode($movie);

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

    $get_details_by_id = function($id) use ($movie_data)
    {
        $movie_details = array(
            'title' => $movie_data->results[$id]->title,

            'rating' => $movie_data->results[$id]->vote_average,

            'poster_url' => $movie_data->results[$id]->poster_path,
            'backdrop_url' => $movie_data->results[$id]->backdrop_path,
            'overview' => $movie_data->results[$id]->overview
        );

        return $movie_details;
    };

    // object
    $genre_ids = $movie_data->results[0]->genre_ids;
    $movie_genre_count = count($movie_data->results[0]->genre_ids);

    // print_r($movie_details);

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
