<?php

function get_poster_url($title)
{
    // URL's
    // Uses s=
    $search_url = "http://www.omdbapi.com/?t=";

    // Parameters
    $search_params = array(
        'type' => 'movie, series or episode',
        'y' => 'year of release',
        'r' => 'json or xml',
        'page' => '1-100',
        'callback' => 'JSONP callback name',
        'v' => 'API version'
    );

    if (isset($title)) {
        $movie = urlencode($title);
    }
    else {
        $movie = urlencode("");
    }

    $movie_json = file_get_contents($search_url . $movie);

    $results = json_decode($movie_json);

    $poster_url = isset($results->Poster) ? $results->Poster: '';

    return $poster_url;
}

$poster_url = get_poster_url('avatar');
?>

<img src="<?php echo $poster_url; ?>" alt="Poster" onerror="this.src = '../../../src/images/movie-poster-placeholder.png';" width="150px">
