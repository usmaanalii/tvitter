<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }
            img {
                margin: 20px;
                border: 3px solid black;
            }
        </style>
        <title>title Image</title>
    </head>
    <body>
        <a href="search.php">Back</a>
        <?php require_once 'title-data.php'; ?>

        <?php $title_details = $get_details_by_id($_GET['id']); ?>

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
    </body>
</html>
