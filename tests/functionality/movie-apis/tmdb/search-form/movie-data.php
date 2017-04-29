<?php
    if (isset($_POST['title-search-input'])) {
        $title = $_POST['title-search-input'];
    } else {
        $title = $_GET['title'];
    }

    $title_query = urlencode($title);

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

    $get_details_by_id = function($id) use ($title_data)
    {
        $title_details = array(
            'title' => $title_data->results[$id]->title,

            'rating' => $title_data->results[$id]->vote_average,

            'poster_url' => $title_data->results[$id]->poster_path,
            'backdrop_url' => $title_data->results[$id]->backdrop_path,
            'overview' => $title_data->results[$id]->overview
        );

        return $title_details;
    };

    // object
    $genre_ids = $title_data->results[0]->genre_ids;
    $title_genre_count = count($title_data->results[0]->genre_ids);

    // print_r($title_details);

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
