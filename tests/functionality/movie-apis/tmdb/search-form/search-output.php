<!-- Returned to ajax call -->
<?php
require_once 'title-data.php';
// All titles returned
for ($i = 0; $i < $titles_returned; $i++) {
$title_details = array(

    // Used for data retrieval
    'id' => $i,

    'title' => $title_data->results[$i]->title,

    'rating' => $title_data->results[$i]->vote_average,

    'poster_url' => $title_data->results[$i]->poster_path,
    'backdrop_url' => $title_data->results[$i]->backdrop_path,
    'overview' => $title_data->results[$i]->overview
); ?>

<div class="single-film">
    <h4>
        <?php echo $title_details['id'] + 1 . '. '; ?>
        <a class="title-link" href="single-title.php?title=<?php echo $title; ?>&id=<?php echo $title_details['id']; ?>"><?php echo $title_details['title']; ?></a>
    </h4>
    <img src="http://image.tmdb.org/t/p/w92<?php echo $title_details['poster_url']; ?>" alt="title Poster" onerror="this.src='../../../../src/images/title-poster-placeholder.png'" wiodth="98" height="144">
</div>


<br>

<?php } ?>

<hr>

<?php $title_details = $get_details_by_id(0); ?>

<h1><?php echo $title_details['title']; ?></h1>

<h3>Rating: <?php echo $title_details['rating']; ?></h3>

<h3>Genres:
    <?php
    for ($i = 0; $i < $title_genre_count; $i++) {
        echo $genres[$genre_ids[$i]] . ' ';
    }
    ?>
</h3>

<?php
    $poster_url = $title_details['poster_url'];
    $backdrop_url = $title_details['backdrop_url'];
?>

<img src="<?php echo "http://image.tmdb.org/t/p/w92$poster_url"?>" alt="X">
<img src="<?php echo "http://image.tmdb.org/t/p/w300$backdrop_url"?>" alt="X">

<p><?php echo $title_details['overview']; ?></p>
<br>
