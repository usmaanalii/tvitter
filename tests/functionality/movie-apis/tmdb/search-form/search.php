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
        <title>Search title</title>
    </head>
    <body>
        <form class="title-search-form" action="title-data.php" method="post">
            <input id="title-search-input" type="text" name="title-search-input" placeholder="e.g die hard" required>
            <input type="submit" name="title-search-submit" value="search">
        </form>

        <div class="all-titles-response">
            <div class="title-data-response">

            </div>

        </div>

        <script src="ajax.js"></script>
    </body>
</html>
