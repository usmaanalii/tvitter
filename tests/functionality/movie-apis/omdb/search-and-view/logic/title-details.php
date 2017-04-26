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

    // $keys = array();
    // foreach ($movie_data as $key => $value) {
    //     array_push($keys, $key);
    // }
    //
    // print_r($keys);

    // Results
    return $movie_data;

}
?>

<?php if (isset($_POST['title_id'])): ?>
    <?php $movie_data = movie_details($_POST['title_id']); ?>

    <?php foreach ($movie_data as $key => $value): ?>
        <?php if (is_string($value)): ?>
            <?php if ($key === "Poster"): ?>
                <h3><?php echo $key; ?>: </h3>
                <img src="<?php echo $value; ?>" alt="poster" width="80px">
            <?php elseif ($key === "Website"): ?>
                <h3><?php echo $key; ?>: </h3>
                <a id="movie-web-link" href="<?php echo $value; ?>" target="_blank"><?php echo $value; ?></a>
            <?php else: ?>
                <h3><?php echo $key; ?>: </h3>
                <h4><?php echo $value; ?></h4>
            <?php endif; ?>
        <?php else: ?>
            <hr>
            <?php foreach ($movie_data->Ratings as $index => $rating_site): ?>
                <h3><?php echo $rating_site->Source; ?>: </h3>
                <h4><?php echo $rating_site->Value; ?></h4>
            <?php endforeach; ?>
            <hr>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
