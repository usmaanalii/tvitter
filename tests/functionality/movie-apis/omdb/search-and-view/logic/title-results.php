<?php require_once __DIR__ . '/../../../../../../includes/profile.inc.php'; ?>

<?php if (isset($_POST['movie-name'])): ?>
    <?php $search_results = UserProfile::search_title($_POST['movie-name']); ?>

    <?php if (array_key_exists('Search', $search_results)): ?>
    <form class="movie-results" action="" method="post">
        <?php foreach ($search_results->Search as $film_id => $film_details): ?>

        <div class="single-movie">
            <a id="<?php echo $film_details->imdbID; ?>" class="movie-link" href="../../../../../../../pages/title-page.php?username=<?php echo $_POST['username']; ?>&film-id=<?php echo $film_details->imdbID; ?>"><?php echo $film_details->Title . ' (' . $film_details->Year . ')'; ?>
            </a>
            <img class="movie-poster" src="<?php echo $film_details->Poster; ?>" alt="" width="50px" onerror="this.src = '../movie-poster-placeholder.png;">
            <input type="radio" name="movie-selection" value="<?php echo $film_details->Title; ?>">
            <br>
        </div>

        <?php endforeach; ?>
    </form>
    <?php else: ?>
        <h4 class="movie-search-error">No results!</h4>
    <?php endif; ?>

<?php endif; ?>