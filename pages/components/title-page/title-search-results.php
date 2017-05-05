<?php if (array_key_exists('Search', $search_results)): ?>
    <form class="title-results" action="" method="post">

        <?php foreach ($search_results->Search as $film_id => $film_details): ?>

        <div class="single-title">

            <a id="<?php echo $film_details->imdbID; ?>" class="title-link" href="../pages/title-page.php?username=<?php echo $_POST['username']; ?>&film-id=<?php echo $film_details->imdbID; ?>"><?php echo $film_details->Title . ' (' . $film_details->Year . ')'; ?>
            </a>
            <img class="img-rounded title-poster" src="<?php echo $film_details->Poster; ?>" alt="" width="50px" onerror="this.src = '../src/images/title-poster-placeholder.png';">

        </div>

        <?php endforeach; ?>
    </form>

<?php else: ?>
    <h4 class="title-search-error">Sorry, we can't find this!</h4>
<?php endif; ?>
