<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="../src/js/ajax/title-page.js"></script>
        <link rel="stylesheet" href="../src/css/navigation.css">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            .container {
                width: 80%;
                max-width: 350px;
                margin: 0 auto;
                margin-top: 5%;
            }

            /* Title search form (START)
            =============================================================== */

             form.search-movie {
                 text-align: center;
                 margin-bottom: 4%;
             }

             form.search-movie input[type="text"] {
                 width: 60%;
                 padding: 0.8% 1.5%;

                 display: block;
                 margin: 0 auto;
             }

             form.search-movie input[type="submit"] {
                 margin-top: 2%;
             }

             form.movie-results {
                 border: 1px solid red;
                 width: 100%;
                 margin: 0 auto;
                 height: 27vh;
                 overflow: scroll;
                 margin-bottom: 2%;
             }

             div.single-movie {
                 background: #e8e9cc;
                 border-bottom: 1px solid red;
             }

             a.movie-link {
                 display: inline-block;
                 width: 70%;
                 word-wrap: break-word;
                 cursor: pointer;
                 vertical-align: middle;
                 margin-left: 2%;
             }

             a:hover {
                 text-decoration: underline;
             }

             img.movie-poster {
                 vertical-align: middle;
             }

             h4.movie-search-error {
                 text-align: center;
                 color: red;
             }

             /* Title search form (END)
             =============================================================== */

            h4 {
                color: blue;
            }
            .error {
                color: red;
            }

        </style>
        <title><?php echo $_GET['username']; ?></title>
    </head>
    <body>

        <div class="container">

        <?php require_once '../components/navigation/navigation-links.php'; ?>

        <form class="search-movie" action="title-page.php" method="post">
            <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
            <input id="search-movie-query" type="text" name="movie-name" placeholder="search title" value="<?php echo isset($_POST['movie-name']) ? $_POST['movie-name'] : '' ?>">
            <input type="submit" name="search-film-submit" value="Search">
        </form>

        <div class="title-search-results">

        </div>

        <div class="title-details">

            <?php require_once '../logic/title-page.php'; ?>

        </div>

        </div>
    </div>

</body>
</html>
