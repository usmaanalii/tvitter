<!--
    - Object: $title_data
    - Keys:
        - Title, Year, Rated, Released, Runtime, Genre, Director,
        Writer, Actors, Plot, Language, Country, Awards, Poster,
        Ratings[0]->Source & Ratings[0]->Value (0, 1, 2),
        Metascore, imdbRating, imdbVotes, imdbId, DVD, BoxOffice
        Production, Website, Response
-->
<h1>
    <?php echo $title_data->Title . ' (' . $title_data->Year . ')'; ?>
</h1>

<img class="img-responsive img-rounded title-poster" src="<?php echo $title_data->Poster; ?>" alt="poster" width="170px" onerror="this.src = '../src/images/title-poster-placeholder.png';">


<div class="ratings">

    <?php if (array_key_exists('imdbRating', $title_data)): ?>
        <div class="imdb-rating">
            <img class="img-responsive rating-icon" src="../src/images/imdb-logo.png" alt="imdb-logo" width="70px">
            <h2 class="rating-value">
                <?php echo $title_data->imdbRating; ?>
            </h2>
            <h5>
                <?php echo $title_data->imdbVotes ?>
            </h5>
        </div>
    <?php endif; ?>

    <?php if (array_key_exists('Metascore', $title_data)): ?>

        <?php if ($title_data->Metascore !== "N/A"): ?>
            <div class="metacritic-rating">
                <img class="img-responsive rating-icon" src="../src/images/metacritic-logo.svg" alt="metacritic-logo" width="45px">
                <h2 class="rating-value">
                <?php if ($title_data->Metascore < 40): ?>
                    <span style="background:#f90000;">
                        <?php echo $title_data->Metascore; ?>
                    </span>
                <?php elseif ($title_data->Metascore < 80 && $title_data->Metascore > 40): ?>
                    <span style="background:#ffcc33">
                        <?php echo $title_data->Metascore; ?>
                    </span>
                <?php else: ?>
                    <span style="background:#66cc33">
                        <?php echo $title_data->Metascore; ?>
                    </span>
                <?php endif; ?>
                </h2>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (array_key_exists('Ratings', $title_data)): ?>
        <?php foreach ($title_data->Ratings as $key => $value): ?>
                <?php if ($value->Source == 'Rotten Tomatoes'): ?>
                    <div class="rotten-rating">
                        <img class="img-responsive rating-icon" src="../src/images/rotten-tomatoes-logo.svg" alt="rotten-logo" width="80px">
                        <h2 class="rating-value">
                            <?php echo "&nbsp;&nbsp;&nbsp;" . $title_data->Ratings[1]->Value; ?>
                        </h2>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
    <?php endif; ?>

</div>

<?php if ($title_data->Plot !== "N/A"): ?>
    <p class="title-plot" data-id="<?php echo $title_data->imdbID; ?>">
        <?php echo $title_data->Plot; ?>
    </p>
<?php else: ?>
    <p class="title-plot title-plot-error">
        <?php echo 'Sorry we have no plot details for this title!'; ?>
    </p>
<?php endif; ?>
