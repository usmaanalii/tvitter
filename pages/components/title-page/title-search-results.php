<?php if (array_key_exists('Search', $search_results)): ?>
    <form class="title-results" action="" method="post">

        <?php foreach ($search_results->Search as $film_id => $film_details): ?>

        <div class="single-title">

            <a id="<?php echo $film_details->imdbID; ?>" class="title-link" href="../pages/title-page.php?username=<?php echo $_POST['username']; ?>&film-id=<?php echo $film_details->imdbID; ?>"><?php echo $film_details->Title . ' (' . $film_details->Year . ')'; ?>
            </a>
            <img class="title-poster" src="<?php echo $film_details->Poster; ?>" alt="" width="50px" onerror="this.src = '../src/images/title-poster-placeholder.png';">
            <input type="radio" name="title-selection" value="<?php echo $film_details->Title; ?>">

            <br>

        </div>

        <?php endforeach; ?>
    </form>

<?php else: ?>
    <h4 class="title-search-error">No results!</h4>
<?php endif; ?>
