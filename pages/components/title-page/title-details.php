<!--
    - Keys:
        - Title, Year, Rated, Released, Runtime, Genre, Director,
        Writer, Actors, Plot, Language, Country, Awards, Poster,
        Ratings[0]->Source & Ratings[0]->Value (0, 1, 2),
        Metascore, imdbRating, imdbVotes, imdbId, DVD, BoxOffice
        Production, Website, Response
-->
<?php foreach ($title_data as $key => $value): ?>

    <?php if (is_string($value)): ?>
        <?php if ($key === "Poster"): ?>
            <h3>
                <?php echo $key; ?>:
            </h3>
            <img src="<?php echo $value; ?>" alt="poster" width="80px">
        <?php elseif ($key === "Website"): ?>
            <h3>
                <?php echo $key; ?>:
            </h3>
            <a id="#title-web-link" href="<?php echo $value; ?>" target="_blank"><?php echo $value; ?></a>
        <?php else: ?>
            <h3>
                <?php echo $key; ?>:
            </h3>
            <h4>
                <?php echo $value; ?>
            </h4>
        <?php endif; ?>
    <?php else: ?>

        <hr>

        <?php foreach ($title_data->Ratings as $index => $rating_site): ?>

            <h3>
                <?php echo $rating_site->Source; ?>:
            </h3>
            <h4>
                <?php echo $rating_site->Value; ?>
            </h4>

        <?php endforeach; ?>

        <hr>

    <?php endif; ?>

<?php endforeach; ?>
