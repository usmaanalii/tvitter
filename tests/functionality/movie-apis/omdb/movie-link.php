<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            h4 {
                color: blue;
            }
            .error {
                color: red;
            }
        </style>
        <title>OMDB API</title>
    </head>
    <body>
        <?php

        function title_details($title)
        {
            // URL's
            $search_url = "http://www.omdbapi.com/";

            // Parameters
            $search_params = array(
                'i' => 'imdb id',
                't' => 'title',
                'type' => 'title, series or episode',
                'plot' => 'short, full',
                'r' => 'json or xml',
                'callback' => 'JSONP callback name',
                'v' => 'API version'
            );

            // Building a search
            $title_json = file_get_contents($search_url . '?' . 't=' . $title);

            $title_data = json_decode($title_json);

            // Results
            return $title_data;
        }

        $details = title_details('avatar');

        print_r($details);
        ?>
    </body>
</html>
