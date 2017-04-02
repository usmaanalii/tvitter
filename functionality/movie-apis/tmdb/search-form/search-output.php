<!-- Returned to ajax call -->
<?php
require_once 'movie-data.php';
// All movies returned
for ($i = 0; $i < $movies_returned; $i++) {
$movie_details = array(

    // Used for data retrieval
    'id' => $i,

    'title' => $movie_data->results[$i]->title,

    'rating' => $movie_data->results[$i]->vote_average,

    'poster_url' => $movie_data->results[$i]->poster_path,
    'backdrop_url' => $movie_data->results[$i]->backdrop_path,
    'overview' => $movie_data->results[$i]->overview
); ?>

<div class="single-film">
    <h4>
        <?php echo $movie_details['id'] + 1 . '. '; ?>
        <a class="movie-link" href="single-movie.php?movie=<?php echo $movie; ?>&id=<?php echo $movie_details['id']; ?>"><?php echo $movie_details['title']; ?></a>
    </h4>
    <img src="http://image.tmdb.org/t/p/w92<?php echo $movie_details['poster_url']; ?>" alt="Movie Poster" onerror="this.src='../../../../src/images/movie-poster-placeholder.png'" wiodth="98" height="144">
</div>


<br>

<?php } ?>

<hr>

<?php $movie_details = $get_details_by_id(0); ?>

<h1><?php echo $movie_details['title']; ?></h1>

<h3>Rating: <?php echo $movie_details['rating']; ?></h3>

<h3>Genres:
    <?php
    for ($i = 0; $i < $movie_genre_count; $i++) {
        echo $genres[$genre_ids[$i]] . ' ';
    }
    ?>
</h3>

<?php
    $poster_url = $movie_details['poster_url'];
    $backdrop_url = $movie_details['backdrop_url'];
?>

<img src="<?php echo "http://image.tmdb.org/t/p/w92$poster_url"?>" alt="X">
<img src="<?php echo "http://image.tmdb.org/t/p/w300$backdrop_url"?>" alt="X">

<p><?php echo $movie_details['overview']; ?></p>
<br>
