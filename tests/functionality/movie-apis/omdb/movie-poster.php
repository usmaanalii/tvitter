<?php

function get_poster_url($title)
{
    // URL's
    // Uses s=
    $search_url = "http://www.omdbapi.com/?t=";

    // Parameters
    $search_params = array(
        'type' => 'title, series or episode',
        'y' => 'year of release',
        'r' => 'json or xml',
        'page' => '1-100',
        'callback' => 'JSONP callback name',
        'v' => 'API version'
    );

    if (isset($title)) {
        $title = urlencode($title);
    }
    else {
        $title = urlencode("");
    }

    $title_json = file_get_contents($search_url . $title);

    $results = json_decode($title_json);

    $poster_url = isset($results->Poster) ? $results->Poster: '';

    return $poster_url;
}

$poster_url = get_poster_url('avatar');
?>

<img src="<?php echo $poster_url; ?>" alt="Poster" onerror="this.src = '../../../src/images/title-poster-placeholder.png';" width="150px">
