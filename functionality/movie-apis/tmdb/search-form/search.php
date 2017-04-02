<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }
        </style>
        <title>Search Movie</title>
    </head>
    <body>
        <form class="movie-search-form" action="movie-data.php" method="post">
            <input id="movie-search-input" type="text" name="movie-search-input" placeholder="e.g die hard" required>
            <input type="submit" name="movie-search-submit" value="search">
        </form>

        <div class="all-movies-response">
            <div class="movie-data-response">

            </div>

        </div>

        <script src="ajax.js"></script>
    </body>
</html>
