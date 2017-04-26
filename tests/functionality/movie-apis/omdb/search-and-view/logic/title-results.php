<?php
    // URL's
    // Uses s=
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

    if (isset($_POST['movie-name'])) {
        $movie = urlencode($_POST['movie-name']);
    }
    else {
        $movie = urlencode("");
    }

    $movie_json = file_get_contents($search_url . $movie);

    $search_results = json_decode($movie_json);

    // Results
    // print_r($search_results);
?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <?php if (array_key_exists('Search', $search_results)): ?>
        <div class="movie-results">
            <?php foreach ($search_results->Search as $film_id => $film_details): ?>

            <div class="single-movie">
                <a id="<?php echo $film_details->imdbID; ?>" class="movie-link" href="single-title.php?film-id=<?php echo $film_details->imdbID; ?>"><?php echo $film_details->Title . ' (' . $film_details->Year . ')'; ?>
                </a>
                <img class="movie-poster" src="<?php echo $film_details->Poster; ?>" alt="" width="50px" onerror="this.src = '../../../../../src/images/movie-poster-placeholder.png';">
                <br>
            </div>

            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <h4 class="movie-search-error">No results!</h4>
    <?php endif; ?>
<?php endif; ?>
