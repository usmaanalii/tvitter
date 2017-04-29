<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            h4 {
                vertical-align: top;
                display: inline;
            }

            img {
                margin-left: 2%;
                border: 3px solid black;
                position: relative;
                width: 40px; height: 57px;
            }

            div.single-film:nth-of-type(even) {
            }
        </style>
        <title>Search ResultsImage</title>
    </head>
    <body>
        <?php require_once 'search-title.php'; ?>

        <?php   // All titles returned
                for ($i = 0; $i < $titles_returned; $i++) {
                $title_details = array(
                    'title' => $title_data->results[$i]->title,

                    'rating' => $title_data->results[$i]->vote_average,

                    'poster_url' => $title_data->results[$i]->poster_path,
                    'backdrop_url' => $title_data->results[$i]->backdrop_path,
                    'overview' => $title_data->results[$i]->overview
                ); ?>

                <div class="single-film">
                    <h4>
                        <?php echo $title_details['title']; ?>
                    </h4>

                    <img src="http://image.tmdb.org/t/p/w92<?php echo $title_details['poster_url']; ?>" alt="title Poster" onerror="this.src='../../../src/images/title-poster-placeholder.png'" wiodth="98" height="144">
                </div>


                <br>

        <?php } ?>

    </body>
</html>
